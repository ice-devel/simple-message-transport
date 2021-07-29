<?php

namespace icedev\SimpleMessageTransport\Handler;

use Icedev\SimpleMessageTransport\Message\Message;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class Handler implements MessageHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(Message $message)
    {
        $this->logger->info("Message reçu");
    }
}
