<?php

declare(strict_types=1);


namespace App\DynamicPublisher;


class RedisChannel
{
    public static $LOG_MESSAGE = 'broadcast-log-message';

    public static $PLATE_CHANGE = 'broadcast-plate-change';

    public static $TEST_CHANNEL = 'app:notifications';
}
