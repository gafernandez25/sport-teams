<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $team_id
 * @property int $number
 * @property ?string $birth_date
 */
class Player extends Model
{
    protected $table = 'players';

    protected $fillable = [
        'first_name',
        'last_name',
        'team_id',
        'number',
        'birth_date',
    ];

    public $timestamps = false;

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}