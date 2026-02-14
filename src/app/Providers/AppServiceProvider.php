<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\HttpCli\ExternalService\Postcode;
use App\Models\Category;
use App\Usecases\Category\CategoryUsecase;
use App\Usecases\Postcode\PostcodeUsecase;
use App\Usecases\Repositories\CategoryRepositoryInterface;
use App\Usecases\Repositories\PostcodeRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ここのファイルはmainのような役割を果たすらしい。依存性の注入はここで行う。
        // TODO: testの場合も同様にregisterみたいなものがあるのか調べておく
        // MEMO: repositoryと実装の詳細クラスを紐づける必要があるらしい
        $this->app->bind(CategoryRepositoryInterface::class, Category::class);
        // MEMO: usecaseをControllerに注入するときにusecaseがrepositoryにコンストラクタの形で依存しているので
        // usecaseインスタンスを生成する際に実装の詳細クラスを引数にいれて注入するのがこれっぽい??
        // $this->app->bind(CategoryUsecase::class, function ($app) {
        //     return new CategoryUsecase($app->make(CategoryRepositoryInterface::class));
        // });
                $this->app->bind(CategoryUsecase::class, function ($app) {
            // こっちが正しい??
            return new CategoryUsecase($app->make(Category::class));
            // それともこっちが正しい??
            // return new CategoryUsecase($app->make(CategoryRepositoryInterface::class));
        });

        // MEMO: つまりusecaseがどの実装クラスを使うかの宣言と、
        // usecaseがその実装クラスを引数として注入しながらインスタンスを作るために上のコードを書かないと行けないってことだと思われる。


        // TODO: 検討repositoryの実装クラス集約したrepositoryImpl構造体をusecaseに注入する方が都合がよい? 自在にデータ取得をロジックにかけるようになるから　逆に副作用はあるか??

        // postcode
        $this->app->bind(PostcodeRepositoryInterface::class, Postcode::class);

        $this->app->bind(PostcodeUsecase::class, function ($app) {
            return new PostcodeUsecase($app->make(PostcodeRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
