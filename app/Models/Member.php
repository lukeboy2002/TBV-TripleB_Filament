<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Member extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'id',
        'user_id',
        'image',
        'bio',
        'city',
        'birthdate',
        'points',
        'played_games',
        'won_games',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_MAX, 250, 250);
    }

    protected function birthdate(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Carbon::createFromFormat('m/d/Y', $value)
                ->format('Y-m-d'),
        );
    }
}
