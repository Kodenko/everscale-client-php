<?php declare(strict_types=1);

namespace TON\Debot;

use TON\Crypto\KeyPair;

class BrowserData
{
    public CurrentStepData $current;

    /**
     * @var DebotStep[]
     */
    public array $next;

    public KeyPair $keys;

    public string $address;

    public bool $finished = false;

    public bool $switch_started = false;

    /**
     * @var string[]
     */
    public array $msg_queue = [];

    /**
     * @var array
     */
    public array $bots = [];
}
