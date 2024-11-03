<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends ModelBase
{
    protected $table = 'role';

    public function getItemNodesIdByIds(array $ids): array
    {
        return self::query()->whereIn('id', $ids)->get()->toArray();
    }
}
