<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Net;

use JsonSerializable;
use stdClass;

class ResultOfQueryCollection implements JsonSerializable
{
    private array $_result;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_result = $dto['result'] ?? [];
    }

    public function getResult(): array
    {
        return $this->_result;
    }

    /**
     * @return self
     */
    public function setResult(array $result): self
    {
        $this->_result = $result;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_result !== null) $result['result'] = $this->_result;
        return !empty($result) ? $result : new stdClass();
    }
}
