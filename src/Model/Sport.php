<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property string $name
 */
class Sport extends Model
{
    protected $table = 'sports';

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'sport_id');
    }
}