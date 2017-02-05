<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $fillable = ['title', 'body', 'section'];

    public function type() {
      return $this->belongsTo('\App\Models\Type', 'section');
    }
}
