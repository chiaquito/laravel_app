<?php

namespace App\Constants;

class Constant
{
    // 顧客の属性IDの定数
    // 登録店
    public const CustomerTypeRegister = 1;
    // プレミアム登録店
    public const CustomerTypePremiumRegister = 2;
    // 加盟店
    public const CustomerTypeAffiliatedStore = 3;


    // サービスIDの定数
    // 個人向けサービス
    public const ServiceIndividual = 1;
    // お試しサービス
    public const ServiceTrial = 2;
    // 工場向けサービス
    public const ServiceFactory = 3;
    // 一般住宅向けサービス
    public const ServiceGeneralHousing = 4;
    // 在庫管理サービス
    public const ServiceInventoryManagement = 5;
    // 営業サポートサービス
    public const ServiceSalesSupport = 6;
    // 法人向けサービス
    public const ServiceCorporate = 7;
}
