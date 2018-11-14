<?php

// src/OpenClassRoom/PlatformBundle/BigBrother/MessageListener.php

namespace OpenClassRoom\PlatformBundle\BigBrother;

use OpenClassRoom\PlatformBundle\Event\MessagePostEvent;
use OpenClassRoom\PlatformBundle\Event\PlatformEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MessageListener implements EventSubscriberInterface
{
    protected $notificator;
    protected $listUsers = array();

    public function __construct(MessageNotificator $notificator, $listUsers)
    {
        $this->notificator = $notificator;
        $this->listUsers = $listUsers;
    }

    static public function getSubscribedEvents()
    {
        return array(
            PlatformEvents::POST_MESSAGE => "processMessage"
        );
    }

    public function processMessage(MessagePostEvent $event)
    {
        if(in_array($event->getUser()->getUsername(), $this->listUsers))
        {
            $this->notificator->notifyByEmail($event->getMessage(), $event->getUser());
        }
    }



}