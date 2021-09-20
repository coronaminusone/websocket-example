<?php

declare(strict_types=1);


namespace App\DynamicPublisher;


interface MessageInterface
{
    public function getChannel(): string;
}
