<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarde = [];

    protected $whith;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeFilter(Builder $query, array $filters): void
    {

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );

        // $query->when($filters['search'] ?? false, function($quert, $search){
        //     $query->where('title', 'like', '%' . request('search') . '%');
        // });
    }
}
