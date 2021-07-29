<?php

namespace icedev\SimpleMessageTransport\Sender;

use Icedev\SimpleMessageTransport\Message\Message;
use Symfony\Component\Messenger\MessageBusInterface;

class Sender
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus) {
        $this->bus = $bus;
    }

    public function sendMessage(Message $message)
    {
        try {
            $this->bus->dispatch($message);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
