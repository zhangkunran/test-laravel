<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelBase extends Model
{
    public function getItemById(int $id): ?array
    {
        $first = self::query()->where('id', $id)->first();
        return $first?->toArray();
    }


    public function getItemAll(): array
    {
        return self::query()->get()->toArray();
    }
}
