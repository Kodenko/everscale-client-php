<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Crypto;

use JsonSerializable;
use stdClass;

class ResultOfMnemonicFromRandom implements JsonSerializable
{
    private string $_phrase;

    public function __construct(?array $dto = null)
    {
        if (!$dto) $dto = [];
        $this->_phrase = $dto['phrase'] ?? '';
    }

    public function getPhrase(): string
    {
        return $this->_phrase;
    }

    /**
     * @return self
     */
    public function setPhrase(string $phrase): self
    {
        $this->_phrase = $phrase;
        return $this;
    }

    public function jsonSerialize()
    {
        $result = [];
        if ($this->_phrase !== null) $result['phrase'] = $this->_phrase;
        return !empty($result) ? $result : new stdClass();
    }
}
