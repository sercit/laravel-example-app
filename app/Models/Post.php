<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author_id' => $this->author_id
        ];
    }

    public function getScoutKey(): string
    {
        return $this->title;
    }

    public function getScoutKeyName(): string
    {
        return 'title';
    }

    public function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('author');
    }

    public function shouldBeSearchable(): bool
    {
        return $this->status === 'published';
    }
}
