<?php

namespace App\Models;

use Framework\Core\Model;

class Monster extends Model
{
    protected static ?array $fillable = ['name', 'biome', 'danger', 'hp'];

    public ?int $id = null;
    public ?string $name = null;
    public ?string $biome = null;
    public ?int $danger = null;
    public ?int $hp = null;
}
