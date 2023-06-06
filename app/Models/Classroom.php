<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'semester', 'shift'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function exams(): HasMany
    {
        return $this->HasMany(Exam::class);
    }
}
