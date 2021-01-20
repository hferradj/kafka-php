<?php

declare(strict_types=1);

namespace Hferradj\Kafka\Consumer\StopStrategy;

use Amp\Loop;
use Hferradj\Kafka\Consumer;
use Hferradj\Kafka\Consumer\StopStrategy;

final class Delay implements StopStrategy
{
    /**
     * The amount of time, in milliseconds, to stop the consumer
     *
     * @var int
     */
    private $delay;

    public function __construct(int $delay)
    {
        $this->delay = $delay;
    }

    public function setup(Consumer $consumer): void
    {
        Loop::delay(
            $this->delay,
            function () use ($consumer): void {
                $consumer->stop();
            }
        );
    }
}
