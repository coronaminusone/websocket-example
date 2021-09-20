<?php

declare(strict_types=1);


namespace App\DynamicPublisher;

use App\DynamicPublisher\MessageInterface;

interface PublisherInterface
{
    public function send(MessageInterface $message);
}
