<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gundam extends Model
{
    public function organization() {
        return $this->belongsTo(Organization::class);
    }
    public function pilots() {
        return $this->belongsToMany(Pilot::class);
    }

}
