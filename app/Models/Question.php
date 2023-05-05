<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function exam(): BelongsToMany
    
    {
        return $this->belongsToMany(Question::class);
    }
}
