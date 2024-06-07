<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property string $name
 * @property ?string $city
 * @property int $sport_id
 * @property ?int $captain_id
 * @property ?string $foundation_date
 *
 * @property Sport $sport
 * @property ?Player $captain
 * @property Collection<int,Player> $players
 */
class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'city',
        'sport_id',
        'foundation_date',
        'captain_id',
    ];

    public $timestamps = false;

    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }

    public function captain(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'captain_id');
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class, 'team_id');
    }
}