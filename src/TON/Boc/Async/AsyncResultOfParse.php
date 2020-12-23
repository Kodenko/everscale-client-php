<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Boc\Async;

use TON\Boc\ResultOfParse;
use TON\TonClientException;
use TON\TonRequest;

class AsyncResultOfParse
{
    /** TON request handle. */
    private TonRequest $_request;

    /**
     * AsyncResultOfParse constructor.
     * @param TonRequest $request Request handle.
     */
    public function __construct(TonRequest $request)
    {
        $this->_request = $request;
    }

    /**
     * Blocks until function execution is finished and returns execution result.
     * @param int $timeout Await timeout in millis. -1 means no timeout.
     * @return ResultOfParse Function execution result.
     * @throws TonClientException Function execution error.
     */
    public function await(int $timeout = -1): ResultOfParse
    {
        return new ResultOfParse($this->_request->await($timeout));
    }
}
