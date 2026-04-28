<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    protected $fillable = [
        'accession_number',
        'name_of_object',
        'material',
        'type',
        'remarks',

        'excavation_site',
        'excavation_date',

        'date_recorded',
        'recorded_by',

        'length_cm',
        'height_cm',
        'width_cm',
        'rim_diameter_cm',
        'base_diameter_cm',
        'thickness_cm',

        'condition_before',
        'conservation_process',
        'condition_after',

        'image',
        'model_3d'
    ];

    public function images()
    {
        return $this->hasMany(ArtifactImage::class);
    }
}