<?php

namespace App\Models;

use Framework\Core\Model;

class Monster extends Model
{
    protected static ?array $fillable = ['biomeId', 'name', 'danger', 'hp'];

    public ?int $id = null;
    public ?int $biomeId = null;
    public ?string $name = null;
    public ?int $danger = null;
    public ?int $hp = null;

    public function getBiome(): ?Biome
    {
        return $this->getOneRelated(Biome::class);
    }
}
