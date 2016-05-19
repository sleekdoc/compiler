# Sleek Doc Generator


### Required Annotations

In your class, you are required to add annotations such as

``@sleekdoc_init`` to tell generator to initialize the class provided.

The ``@sleekdoc_namespace`` to have a unified documentation.

The ``@sleekdoc_category`` to separate class functions.

### Template

### Web Server

Create an ``index.php`` file to your public folder and copy this.

```php
<?php

use Daison\SleekDoc\Generator;
use Daison\Tests\Classes\Controller;

$root = dirname(__DIR__);

require $root.'/autoload.php';

$generator = new Generator([
    Controller::class => [
        'getAction',
        'createAction',
    ],
]);

$generator->addData('title', 'This is my title');
$generator->addData('default_base_uri', 'http://internal-api.app');

$blade = $generator->make(
            $root.'/storage/views',
            $root.'/storage/cache'
         );

echo $blade->render();
```

The code above will generate an HTML format

