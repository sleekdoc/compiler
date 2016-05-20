# Sleek Doc Generator


### Required Annotations

In your class, you are required to add annotations such as

``@sleekdoc_init`` to tell generator to initialize the class provided.
The ``@sleekdoc_namespace`` to have a unified documentation.
The ``@sleekdoc_category`` to separate class functions.

### Web Server

Create an ``index.php`` file to your public folder and copy this.

```php
<?php

$root = dirname(__DIR__);

require $root.'/autoload.php';

$generator = new Daison\SleekDoc\Generator([
    'MyClass\Should\Be\Here' => [
        'functionHere',
        'anotherFunctionHere',
    ],
]);

$generator->addData('title', 'This is my title');
$generator->addData('default_base_uri', [
    'json' => 'http://json-api.app',
    'xml'  => 'http://xml-api.app',
]);

$blade = $generator->make(
            $root.'/resources/views',
            $root.'/storage/cache'
         );

echo $blade->render();
```

The code above should show you the entire generated documentations.

Now to finish it up, you should point your web server to use that ``index.php`` instead.

### Themes and Blade Engine

We're using blade template engine (A Laravel template engine) to be our relying **View**.

Basing it in our configuration, we configured the views directory inside ``$root.'/resources/views'``

So in your blade template, you could access a variable ``$data``, containing this kind of array value

```
array(3) {
  ["title"]=>
  string(10) "Sample API"
  ["default_base_uri"]=>
  array(2) {
    ["json"]=>
    string(23) "http://json-api.app"
    ["xml"]=>
    string(23) "http://xml-api.app"
  }
  ["api"]=>
  array(2) {
    ["JSON"]=>
    array(1) {
      ["/booking"]=>
      array(5) {
        ["sleekdoc_init"]=>
        bool(true)
        ["sleekdoc_category"]=>
        string(4) "JSON"
        ["sleekdoc_namespace"]=>
        string(8) "/booking"
        ["description"]=>
        string(85) "This handles the entire booking process, from creation until
the cancellation process"
        ["functions"]=>
        array(3) {
          [0]=>
          array(8) {
            ["sleekdoc_init"]=>
            bool(true)
            ["method"]=>
            string(3) "GET"
            ["route"]=>
            string(8) "/booking"
            ["description"]=>
            string(42) "This is the description of /booking prefix"
            ["headers"]=>
            object(stdClass)#8 (1) {
              ["authorization"]=>
              object(stdClass)#9 (2) {
                ["label"]=>
                ...
          }
        }
       }
    }
   }
   ["XML"]=>
    array(1) {
      ["Booking"]=>
      array(5) {
        ["sleekdoc_init"]=>
        bool(true)
        ["sleekdoc_category"]=>
        string(3) "XML"
        ["sleekdoc_namespace"]=>
        string(7) "Booking"
        ["description"]=>
        string(16) "Description Here"
        ["functions"]=>
        array(1) {
          [0]=>
          array(4) {
            ["sleekdoc_init"]=>
            bool(true)
            ["name"]=>
            string(7) "Details"
            ["description"]=>
            string(12) "This is shit"
            ["raw_xml"]=>
            string(498) "..."
          }
        }
      }
    }
  }
}
```

For realtime value, after ``$generator->make(...)`` try to die-and-dump the data ``dd($generator->getData())``

### Samples

- default sample [https://github.com/sleekdoc/sample]
