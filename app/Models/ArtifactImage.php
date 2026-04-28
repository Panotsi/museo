<?php

namespace App\Models;

use App\Models\ArtifactImage;
use Illuminate\Database\Eloquent\Model;

class ArtifactImage extends Model
{
    protected $fillable = ['artifact_id', 'image'];

    public function artifact()
    {
        return $this->belongsTo(Artifact::class);
    }
}
