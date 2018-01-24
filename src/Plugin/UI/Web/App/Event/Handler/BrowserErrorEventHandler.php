<?php
declare(strict_types=1);

namespace Application\Event\Handler;

use Sse\Event;
use Zend\EventManager\EventManagerInterface;

class BrowserErrorEventHandler implements Event
{
    private $events;
    private $message;

    public function __construct(EventManagerInterface $events)
    {
        $this->events = $events;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function update()
    {
        return \json_encode([
            "OK" => [
                "message" => $this->message
            ]
        ]);
    }

    public function check()
    {
        $run = false;
        if (!empty($this->message)) {
            $run = true;

            $this->events->trigger(
                'error_handled',
                $this,
                [$this->message]
            );
        }
        return $run;
    }

    public function onErrorHandled(Event $event)
    {
        // Do something with the $event here
        $name = $event->getName();
        $target = $event->getTarget();
        $params = $event->getParams();
    }
}
