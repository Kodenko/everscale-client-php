<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Client;

use TON\Client\Async\AsyncClientModule;
use TON\Client\Async\ClientModuleAsyncInterface;
use TON\TonContext;

class ClientModule implements ClientModuleInterface
{
    private TonContext $_context;

    /**
     * ClientModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @return ClientModuleAsyncInterface Async version of client module interface.
     */
    public function async(): ClientModuleAsyncInterface
    {
        return new AsyncClientModule($this->_context);
    }

    /**
     * @return ResultOfGetApiReference
     */
    public function getApiReference(): ResultOfGetApiReference
    {
        return new ResultOfGetApiReference($this->_context->callFunction('client.get_api_reference'));
    }

    /**
     * @return ResultOfVersion
     */
    public function version(): ResultOfVersion
    {
        return new ResultOfVersion($this->_context->callFunction('client.version'));
    }

    /**
     * @return ClientConfig
     */
    public function config(): ClientConfig
    {
        return new ClientConfig($this->_context->callFunction('client.config'));
    }

    /**
     * @return ResultOfBuildInfo
     */
    public function buildInfo(): ResultOfBuildInfo
    {
        return new ResultOfBuildInfo($this->_context->callFunction('client.build_info'));
    }

    /**
     * @param ParamsOfResolveAppRequest $params
     */
    public function resolveAppRequest(ParamsOfResolveAppRequest $params)
    {
        $this->_context->callFunction('client.resolve_app_request', $params);
    }
}
