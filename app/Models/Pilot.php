<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    public function gundams() {
        return $this->belongsToMany(Gundam::class);
    }
    public function gruntSuits() {
        return $this->belongsToMany(GruntSuit::class);
    }

}
