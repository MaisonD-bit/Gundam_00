<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function gundams() {
        return $this->hasMany(Gundam::class);
    }
    public function gruntSuits() {
        return $this->hasMany(GruntSuit::class);
    }
}
