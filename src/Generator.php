<?php
/**
 * Daison\SleekDoc Helpers
 *
 * @copyright 2015-2016 Daison Carino <daison12006013@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://github.com/sleekdoc/sleekdoc
 */

/**
 * @package Daison
 * @subpackage Daison\SleekDoc
 */
namespace Daison\SleekDoc;

use Exception;
use Jenssegers\Blade\Blade;
use Minime\Annotations\Reader;

/**
 * This class handles the generation of data parsed from classes
 */
class Generator
{
    private $data = [];
    private $classes = [];

    /**
     * This initialize everything
     *
     * @param mixed $classes An array of each classes with their respective
     * functions
     */
    public function __construct($classes)
    {
        $this->classes = $classes;
    }

    /**
     * Initialize a parameter
     *
     * @param string $key
     * @param int|bool|mixed $val
     * @return \Daison\SleekDoc\Generator|mixed
     */
    public function addData($key, $val)
    {
        $this->data[$key] = $val;

        return $this;
    }

    /**
     * Get the parameters
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * This is the function that handles the files to be generated.
     *
     * @param  string $views_dir  This is the templates' directory, it contains
     * all the blade template needed
     * @param  string $cache_dir  This is used to cache templates generated from
     * blade compiler
     * @param  string $template   The template to use
     * @return void
     */
    public function make(
        $views_dir = __DIR__.'/Resources/views',
        $cache_dir = __DIR.'/Resources/cache',
        $template = 'index'
    ) {
        $reader = Reader::createFromDefaults();

        $docs = [];

        # iterate all classes and their functions
        foreach ($this->classes as $class => $functions) {

            # get the class annotations
            $anno_class = $reader->getClassAnnotations($class)->toArray();

            if (!isset($anno_class['sleekdoc_init'])) {
                continue;
            }

            if (!isset($anno_class['sleekdoc_namespace'])) {
                throw new Exception("The annotation @sleekdoc_namespace must be declared in the class of $class.");
            }

            if (!isset($anno_class['sleekdoc_category'])) {
                throw new Exception("The annotation @sleekdoc_category must be declared in the class of $class.");
            }

            $namespace = $anno_class['sleekdoc_namespace'];
            $category = $anno_class['sleekdoc_category'];
            $this->data['api'][$category][$namespace] = $anno_class;

            # iterate each functions from the class
            foreach ($functions as $func) {

                $anno_method = $reader->getMethodAnnotations(
                    $class,
                    $func
                )->toArray();

                if (!isset($anno_method['sleekdoc_init'])) {
                    continue;
                }

                $this->data['api'][$category][$namespace]['functions'][] = $anno_method;
            }
        }

        return static::blade($views_dir, $cache_dir)
            ->make(
                $template,
                ['data' => $this->data]
            );
    }

    /**
     * Call blade template engine
     *
     * @param  string $views_dir  This is the templates' directory, it contains
     * all the blade template needed
     * @param  string $cache_dir  This is used to cache templates generated from
     * blade compiler
     * @return \Jenssegers\Blade\Blade|mixed
     */
    public static function blade($views_dir, $cache_dir)
    {
        return new Blade($views_dir, $cache_dir);
    }
}
