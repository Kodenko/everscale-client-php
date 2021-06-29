<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ParamsOfAppEncryptionBox_Decrypt extends ParamsOfAppEncryptionBox implements JsonSerializable
{
    private string $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_data = $dto['data'] ?? '';
    }

    public function getData(): string
    {
        return $this->_data;
    }

    /**
     * @return self
     */
    public function setData(string $data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = ['type' => 'Decrypt'];
        if ($this->_data !== null) $result['data'] = $this->_data;
        return !empty($result) ? $result : new stdClass();
    }
}
