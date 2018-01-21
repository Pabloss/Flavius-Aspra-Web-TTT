<?php
declare(strict_types=1);
chdir(dirname(__DIR__, 5));
require 'vendor/autoload.php';

use Sse\Event;
use Sse\SSE;

//create the event handler
class YourEventHandler implements Event
{
    public function update()
    {
        //Here's the place to send data
        return 'Hello, Paweł!';
    }

    public function check()
    {
        //Here's the place to check when the data needs update
        return true;
    }
}

$sse = new SSE(); //create a libSSE instance
$sse->addEventListener('event_name', new YourEventHandler());//register your event handler
$sse->start();//start the event loop
