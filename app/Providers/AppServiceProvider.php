<?php

namespace App\Providers;

use App\Models\SqlLog;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::listen(function ($query) {
            $error = '';
            $sql = '';
            try {
                // 记录 SQL 执行
                $sql = str_replace("?", "'%s'", $query->sql);
                $sql = vsprintf($sql, $query->bindings);
            } catch (QueryException $e) {
                $error = $e->getMessage();
            }
            Log::channel('sql')->info($sql, [
                'user_id' => session('user_id', 0),
                'executed_at' => time(),
                'error' => $error
            ]);
        });
    }
}
