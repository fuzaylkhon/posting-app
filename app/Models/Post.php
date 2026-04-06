<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, HasUuids;

    const THEME_NATURE  = 'nature';
    const THEME_POETRY  = 'poetry';
    const THEME_SCIENCE = 'science';

    const THEMES = [
        self::THEME_NATURE,
        self::THEME_POETRY,
        self::THEME_SCIENCE,
    ];

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'title',
        'body',
        'theme',
        'user_id',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function excerpt(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::limit(strip_tags($this->body), 150),
        );
    }
}
