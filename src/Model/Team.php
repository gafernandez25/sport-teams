<?php

declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property-read int $id
 * @property string $name
 * @property ?string $city
 * @property int $sport_id
 * @property ?string $foundation_date
 */
class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'city',
        'sport_id',
        'foundation_date',
    ];

    public $timestamps = false;

    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }
}