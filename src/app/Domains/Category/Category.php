<?php

namespace App\Domains\Category;

use App\Constants\Constant;

class Category
{
    private int $id;
    private string $name;
    private int $serviceId;

    public function __construct(int $id, string $name, int $serviceId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->serviceId = $serviceId;
    }

    // 顧客に表示するカテゴリか否かの判断
    public function isDisplayable(int $customerTypeId): bool
    {
        // 顧客が登録店の表示可否判定
        if ($customerTypeId === Constant::CustomerTypeRegister) {
            return $this->isDisplayableForRegister();
        }

        // 顧客がプレミアム登録店の表示可否判定
        if ($customerTypeId === Constant::CustomerTypePremiumRegister ) {
            return $this->isDisplayableForPremiumRegister();
        }

        // 顧客が加盟店の表示可否判定
        if ($customerTypeId === Constant::CustomerTypeAffiliatedStore ) {
            return $this->isDisplayableForAffiliatedStore();
        }

        return false;
    }




    // 登録店の顧客に対するカテゴリ表示可否判定
    private function isDisplayableForRegister(): bool
    {
            // 登録店の顧客は利用できるサービスを一番絞っているため、
            // 表示されるカテゴリは一番少ない。
            // 表示するサービスは お試しサービス、個人向けサービスのみである。
            if ($this->serviceId === Constant::ServiceIndividual
            || $this->serviceId === Constant::ServiceTrial) {
                return true;
            }
            return false;
    }

    // プレミアム登録店の顧客に対するカテゴリ表示可否判定
    private function isDisplayableForPremiumRegister(): bool
    {
            // プレミアム登録店の顧客は利用できるサービスは登録店の顧客より多い
            // 登録点に加えて、工場向けサービスと一般住宅向けサービスも利用できるため、表示されるカテゴリも登録店の顧客より多い。
            if ($this->serviceId === Constant::ServiceFactory
            || $this->serviceId === Constant::ServiceGeneralHousing) {
                return true;
            }
            return $this->isDisplayableForRegister();
    }

    // 加盟店の顧客に対するカテゴリ表示可否判定
    private function isDisplayableForAffiliatedStore(): bool
    {
          // 加盟店の顧客は現在サービス提供中のすべてのサービスを利用できるため、
          // すべてのカテゴリを表示する。
          // ただし、在庫管理サービスはサービス受付停止中のため顧客には表示しない
          if ($this->serviceId === Constant::ServiceIndividual
            || $this->serviceId === Constant::ServiceTrial
            || $this->serviceId === Constant::ServiceFactory
            || $this->serviceId === Constant::ServiceGeneralHousing
            || $this->serviceId === Constant::ServiceSalesSupport
            || $this->serviceId === Constant::ServiceCorporate) {
                return true;
        }

        return false;
    }
}
