<?php

declare(strict_types=1);

namespace App\Store\Application\Event;

interface EventBus
{
    public function dispatch(Event $event): void;
}
