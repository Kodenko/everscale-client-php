<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfMnemonicWords implements JsonSerializable
{
    private string $_words;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_words = $dto['words'] ?? '';
    }

    public function getWords(): string
    {
        return $this->_words;
    }

    /**
     * @return self
     */
    public function setWords(string $words): self
    {
        $this->_words = $words;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_words !== null) $result['words'] = $this->_words;
        return !empty($result) ? $result : new stdClass();
    }
}
