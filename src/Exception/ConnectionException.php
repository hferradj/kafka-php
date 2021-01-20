<?php

declare(strict_types=1);

namespace Hferradj\Kafka\Exception;

use Hferradj\Kafka\Exception;
use function sprintf;

final class ConnectionException extends Exception
{
    public static function fromBrokerList(string $brokerList): self
    {
        return new self(
            sprintf(
                'It was not possible to establish a connection for metadata with the brokers "%s"',
                $brokerList
            )
        );
    }
}
