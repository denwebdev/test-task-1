<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Query
 *
 * @property int $id
 * @property int $inn
 * @property bool $is_correct
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Query newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Query newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Query query()
 * @method static \Illuminate\Database\Eloquent\Builder|Query whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Query whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Query whereInn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Query whereIsCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Query whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Query whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Query extends Model implements QueryInterface
{
    use HasFactory;

    protected $guarded = [];

    public function isNew(): bool
    {
        return $this->wasRecentlyCreated;
    }

    public function isExpired(): bool
    {
        return $this->updated_at->diffInHours(Carbon::now()) >= 1;
    }

    public function getQuery(string $inn): self
    {
        return self::firstOrCreate([
            'inn' => $inn
        ]);
    }

    public function saveMessage(string $message): void
    {
        $this->update([
            'message' => $message
        ]);
    }

    public function setCorrect(): void
    {
        $this->update([
            'is_correct' => true
        ]);
    }

    public function isCorrect(): bool
    {
        return $this->is_correct;
    }
}
