<?php
namespace Daison\Tests;

use Daison\SleekDoc\Generator;

class RestTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $generator = new Generator([
            \Daison\Tests\Classes\Controller::class => [
                'getAction',
                'createAction',
            ],
        ]);

        $generator->addData('title', 'VroomVroomVroom API');
        $generator->addData('default_base_uri', 'http://internal-api.app');

        $root = dirname(__DIR__);

        $blade = $generator->make(
                    $root.'/storage/views',
                    $root.'/storage/cache'
                 );

        $blade->render(); // try to print this
    }
}
