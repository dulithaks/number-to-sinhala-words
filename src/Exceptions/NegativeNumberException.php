<?php

namespace Dulithaks\NumberToSinhalaWords\Exceptions;

use InvalidArgumentException;

class NegativeNumberException extends InvalidArgumentException
{
    /**
     * Create a new NegativeNumberException.
     *
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "Negative numbers are not supported.", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
