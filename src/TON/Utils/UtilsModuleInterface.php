<?php

/**
 * This file is auto-generated.
 */

declare(strict_types=1);

namespace TON\Utils;

use TON\Utils\Async\UtilsModuleAsyncInterface;

interface UtilsModuleInterface
{
    /**
     * @return UtilsModuleAsyncInterface Async version of utils module interface.
     */
    function async(): UtilsModuleAsyncInterface;

    /**
     * @param ParamsOfConvertAddress $params
     * @return ResultOfConvertAddress
     */
    function convertAddress(ParamsOfConvertAddress $params): ResultOfConvertAddress;

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
     * @return ResultOfGetAddressType
     */
    function getAddressType(ParamsOfGetAddressType $params): ResultOfGetAddressType;

    /**
     * @param ParamsOfCalcStorageFee $params
     * @return ResultOfCalcStorageFee
     */
    function calcStorageFee(ParamsOfCalcStorageFee $params): ResultOfCalcStorageFee;

    /**
     * @param ParamsOfCompressZstd $params
     * @return ResultOfCompressZstd
     */
    function compressZstd(ParamsOfCompressZstd $params): ResultOfCompressZstd;

    /**
     * @param ParamsOfDecompressZstd $params
     * @return ResultOfDecompressZstd
     */
    function decompressZstd(ParamsOfDecompressZstd $params): ResultOfDecompressZstd;
}
