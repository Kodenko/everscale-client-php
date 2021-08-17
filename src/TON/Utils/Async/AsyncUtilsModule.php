<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils\Async;

use TON\TonContext;
use TON\Utils\ParamsOfCalcStorageFee;
use TON\Utils\ParamsOfCompressZstd;
use TON\Utils\ParamsOfConvertAddress;
use TON\Utils\ParamsOfDecompressZstd;
use TON\Utils\ParamsOfGetAddressType;

class AsyncUtilsModule implements UtilsModuleAsyncInterface
{
    private TonContext $_context;

    /**
     * AsyncUtilsModule constructor.
     * @param TonContext $context
     */
    public function __construct(TonContext $context)
    {
        $this->_context = $context;
    }

    /**
     * @param ParamsOfConvertAddress $params
     * @return AsyncResultOfConvertAddress
     */
    public function convertAddressAsync(ParamsOfConvertAddress $params): AsyncResultOfConvertAddress
    {
        return new AsyncResultOfConvertAddress($this->_context->callFunctionAsync('utils.convert_address', $params));
    }

    /**
     * Address types are the following
     *
     * `0:919db8e740d50bf349df2eea03fa30c385d846b991ff5542e67098ee833fc7f7` - standard TON address most
     * commonly used in all cases. Also called as hex address
     * `919db8e740d50bf349df2eea03fa30c385d846b991ff5542e67098ee833fc7f7` - account ID. A part of full
     * address. Identifies account inside particular workchain
     * `EQCRnbjnQNUL80nfLuoD+jDDhdhGuZH/VULmcJjugz/H9wam` - base64 address. Also called "user-friendly".
     * Was used at the beginning of TON. Now it is supported for compatibility
     * @param ParamsOfGetAddressType $params
     * @return AsyncResultOfGetAddressType
     */
    public function getAddressTypeAsync(ParamsOfGetAddressType $params): AsyncResultOfGetAddressType
    {
        return new AsyncResultOfGetAddressType($this->_context->callFunctionAsync('utils.get_address_type', $params));
    }

    /**
     * @param ParamsOfCalcStorageFee $params
     * @return AsyncResultOfCalcStorageFee
     */
    public function calcStorageFeeAsync(ParamsOfCalcStorageFee $params): AsyncResultOfCalcStorageFee
    {
        return new AsyncResultOfCalcStorageFee($this->_context->callFunctionAsync('utils.calc_storage_fee', $params));
    }

    /**
     * @param ParamsOfCompressZstd $params
     * @return AsyncResultOfCompressZstd
     */
    public function compressZstdAsync(ParamsOfCompressZstd $params): AsyncResultOfCompressZstd
    {
        return new AsyncResultOfCompressZstd($this->_context->callFunctionAsync('utils.compress_zstd', $params));
    }

    /**
     * @param ParamsOfDecompressZstd $params
     * @return AsyncResultOfDecompressZstd
     */
    public function decompressZstdAsync(ParamsOfDecompressZstd $params): AsyncResultOfDecompressZstd
    {
        return new AsyncResultOfDecompressZstd($this->_context->callFunctionAsync('utils.decompress_zstd', $params));
    }
}
