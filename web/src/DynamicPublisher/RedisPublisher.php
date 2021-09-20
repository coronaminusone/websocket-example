<?php

declare(strict_types=1);


namespace App\DynamicPublisher;

use Symfony\Component\Serializer\SerializerInterface;
use SymfonyBundles\RedisBundle\Redis\ClientInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class RedisPublisher implements PublisherInterface
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(ClientInterface $client, SerializerInterface $serializer) {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function send(MessageInterface $message)
    {

       $redisMessage = $this->serializer->serialize($message, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['channel']]);

        $this->client->publish($message->getChannel(), $redisMessage);
    }
}
