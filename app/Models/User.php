<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends ModelBase
{
    protected $table = 'user';

    public function getItemByMobile(string $mobile): ?array
    {
        $first = self::query()->where('mobile', $mobile)->first();
        return $first?->toArray();
    }
}
