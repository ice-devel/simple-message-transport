<?php

namespace Icedev\SimpleMessageTransport\Handler;

use Icedev\SimpleMessageTransport\Message\MessageApi;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MessageApiHandler implements MessageHandlerInterface
{
    private LoggerInterface $logger;
    private HttpClientInterface $client;

    public function __construct(LoggerInterface $logger, HttpClientInterface $client)
    {
        $this->logger = $logger;
        $this->client = $client;
    }

    public function __invoke(MessageApi $message)
    {
        $this->logger->info("Message API reçu");
        $this->request($message);
    }

    protected function request(MessageApi $message): array
    {
        try {
            return $this->client->request(
                $message->getMethod(),
                $message->getUrl(),
                [
                    'body' =>  $message->getData()
                ]
            )->toArray();
        } catch (ClientExceptionInterface | ServerExceptionInterface $e) {
            throw new \HttpException($e->getCode(), $e->getMessage());
        }
    }
}
