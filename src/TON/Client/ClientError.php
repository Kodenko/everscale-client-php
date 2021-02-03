<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use JsonSerializable;
use stdClass;

class ClientError implements JsonSerializable
{
    private int $_code;
    private string $_message;
    private $_data;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_code = $dto['code'] ?? 0;
        $this->_message = $dto['message'] ?? '';
        $this->_data = $dto['data'] ?? null;
    }

    public function getCode(): int
    {
        return $this->_code;
    }

    public function getMessage(): string
    {
        return $this->_message;
    }

    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return self
     */
    public function setCode(int $code): self
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->_message = $message;
        return $this;
    }

    /**
     * @return self
     */
    public function setData($data): self
    {
        $this->_data = $data;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_code !== null) $result['code'] = $this->_code;
        if ($this->_message !== null) $result['message'] = $this->_message;
        if ($this->_data !== null) $result['data'] = $this->_data;
        return !empty($result) ? $result : new stdClass();
    }
}
