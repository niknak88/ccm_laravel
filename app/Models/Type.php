<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $fillable = ['name', 'type'];

    public function contents() {
      return $this->hasMany('\App\Models\Content', 'section', 'id');
    }
}
