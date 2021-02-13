<?php declare(strict_types=1);

namespace TON\Tvm;

use TON\Abi\Abi;
use TON\Abi\Abi_Contract;
use TON\Abi\CallSet;
use TON\Abi\DeploySet;
use TON\Abi\ParamsOfEncodeMessage;
use TON\Abi\ResultOfEncodeMessage;
use TON\Abi\Signer_Keys;
use TON\AbstractIntegrationTest;
use TON\TestClient;

class TvmModuleIntegrationTests extends AbstractIntegrationTest
{
    public function testRunExecutor()
    {
        $this->runMessage(function (ResultOfEncodeMessage $message, Abi $abi, string $account): string {

            $result = self::$client->tvm()->runExecutor((new ParamsOfRunExecutor())
                ->setMessage($message->getMessage())
                ->setAbi($abi)
                ->setAccount((new AccountForExecutor_Account())
                    ->setBoc($account))
                ->setReturnUpdatedAccount(true));

            $this->assertEquals(
                $message->getMessageId(),
                $result->getTransaction()["in_msg"]);

            $this->assertTrue($result->getFees()->getTotalAccountFees() > 0);

            return $result->getAccount();
        });
    }

    public function testRunTvm()
    {
        $this->runMessage(function (ResultOfEncodeMessage $message, Abi $abi, string $account): string {
            $result = self::$client->tvm()->runTvm((new ParamsOfRunTvm())
                ->setMessage($message->getMessage())
                ->setAbi($abi)
                ->setAccount($account)
                ->setReturnUpdatedAccount(true));
            return $result->getAccount();
        });
    }

    private function runMessage(callable $run)
    {
        [$abi, $tvc] = TestClient::package('Subscription');
        $keys = self::$client->crypto()->generateRandomSignKeys();

        $contract = (new Abi_Contract())->setValue($abi);
        $wallet_address = "0:2222222222222222222222222222222222222222222222222222222222222222";

        $address = TestClient::deployWithGiver(self::$client, (new ParamsOfEncodeMessage())
            ->setAbi($contract)
            ->setDeploySet((new DeploySet())->setTvc($tvc))
            ->setCallSet((new CallSet())
                ->setFunctionName("constructor")
                ->setInput(["wallet" => $wallet_address]))
            ->setSigner((new Signer_Keys())->setKeys($keys)));

        $account = TestClient::fetchAccount(self::$client, $address)["boc"];

        $subscribe_params = [
            "subscriptionId" => "0x1111111111111111111111111111111111111111111111111111111111111111",
            "pubkey" => "0x2222222222222222222222222222222222222222222222222222222222222222",
            "to" => "0:3333333333333333333333333333333333333333333333333333333333333333",
            "value" => "0x123",
            "period" => "0x456"
        ];

        $message = self::$client->abi()->encodeMessage((new ParamsOfEncodeMessage())
            ->setAddress($address)
            ->setAbi($contract)
            ->setCallSet((new CallSet())
                ->setFunctionName("subscribe")
                ->setInput($subscribe_params))
            ->setSigner((new Signer_Keys())->setKeys($keys)));

        $account = $run($message, $contract, $account);

        // check subscription

        $message = self::$client->abi()->encodeMessage((new ParamsOfEncodeMessage())
            ->setAbi($contract)
            ->setCallSet((new CallSet())
                ->setFunctionName("getSubscription")
                ->setInput(["subscriptionId" => $subscribe_params["subscriptionId"]]))
            ->setSigner((new Signer_Keys())->setKeys($keys))
            ->setAddress($address));

        $result = self::$client->tvm()->runTvm((new ParamsOfRunTvm())
            ->setAbi($contract)
            ->setAccount($account)
            ->setMessage($message->getMessage()));

        $this->assertEquals(
            $subscribe_params["pubkey"],
            $result->getDecoded()->getOutput()["value0"]["pubkey"]);
    }
}
