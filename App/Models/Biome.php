<?php

namespace App\Models;

use Framework\Core\Model;

class Biome extends Model
{
    protected static ?array $fillable = ['name', 'climate', 'description'];

    public ?int $id = null;
    public ?string $name = null;
    public ?string $climate = null;
    public ?string $description = null;

    public function getMonsters(): array
    {
        return $this->getAllRelated(Monster::class);
    }
}
