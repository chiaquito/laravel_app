<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Domains\Category\Category;
use App\Constants\Constant;

use Tests\Common\RandInt;
use Tests\Common\RandStr;

class CategoryTest extends TestCase
{

    private static function createValidDomain(int $serviceId): Category
    {
        return new Category(RandInt::id(), RandStr::random(15), $serviceId);
    }

    # 顧客に表示するカテゴリか否かの判断のテスト
    ## 登録店の顧客(CustomerTypeRegister)に対するカテゴリ表示可否判定のテスト
    ## 登録店の顧客に個人向けサービスは表示される
    public function test_isDisplayable_CustomerTypeRegister1(): void
    {
        $got = $this->createValidDomain(Constant::ServiceIndividual)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertTrue($got);
    }

    ## 登録店の顧客にお試しサービスは表示される
    public function test_isDisplayable_CustomerTypeRegister2(): void
    {
        $got = $this->createValidDomain(Constant::ServiceTrial)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertTrue($got);
    }

    ## 登録店の顧客に工場向けサービスは表示されない
    public function test_isDisplayable_CustomerTypeRegister3(): void
    {
        $got = $this->createValidDomain(Constant::ServiceFactory)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertFalse($got);
    }

    ## 登録店の顧客に一般住宅向けサービスは表示されない
    public function test_isDisplayable_CustomerTypeRegister4(): void
    {
        $got = $this->createValidDomain(Constant::ServiceGeneralHousing)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertFalse($got);
    }

    ## 登録店の顧客に在庫管理サービスは表示されない
    public function test_isDisplayable_CustomerTypeRegister5(): void
    {
        $got = $this->createValidDomain(Constant::ServiceInventoryManagement)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertFalse($got);
    }

    ## 登録店の顧客に営業サポートサービスは表示されない
    public function test_isDisplayable_CustomerTypeRegister6(): void
    {
        $got = $this->createValidDomain(Constant::ServiceSalesSupport)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertFalse($got);
    }

    ## 登録店の顧客に法人向けサービスは表示されない
    public function test_isDisplayable_CustomerTypeRegister7(): void
    {
        $got = $this->createValidDomain(Constant::ServiceCorporate)->isDisplayable(Constant::CustomerTypeRegister);
        $this->assertFalse($got);
    }


    ## プレミアム登録店の顧客(CustomerTypePremiumRegister)に対するカテゴリ表示可否判定のテスト
    ## プレミアム登録店の顧客に個人向けサービスは表示される
    public function test_isDisplayable_CustomerTypePremiumRegister1(): void
    {
        $got = $this->createValidDomain(Constant::ServiceIndividual)->isDisplayable(Constant::CustomerTypePremiumRegister);
        $this->assertTrue($got);
    }
}
