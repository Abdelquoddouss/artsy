<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'titre', 'genre', 'description', 'publication_year', 'partenaires_id'];

    public function partenaire()
    {
        return $this->belongsTo('App\Models\Partenaires', 'partenaires_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function pendingUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_user')
                    ->withPivot('status')
                    ->wherePivot('status', 'pending');
    }
}
