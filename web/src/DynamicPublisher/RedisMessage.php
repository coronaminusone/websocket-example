<?php

declare(strict_types=1);


namespace App\DynamicPublisher;

use Symfony\Component\Serializer\Annotation\Ignore;


class RedisMessage implements MessageInterface
{
    /**
     * @var string
     */
    private $message;

    private $peoples = [];


    /**
     * @var string
     */
    private $channel;

    public function __construct(string $channel)
    {
        $this->channel = $channel;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @param array $peoples
     */
    public function setPeoples(array $peoples): void
    {
        $this->peoples = $peoples;
    }

    public function getPeoples(): array
    {
        return $this->peoples;
    }
}
