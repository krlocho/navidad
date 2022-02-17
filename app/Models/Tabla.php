<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    use HasFactory;

    public function edad(){
      $edad= \Carbon\Carbon::parse($this->f_creacion)->age;
      return $edad;
}

public function categoria(){

    return $this->hasOne(Categoria::class, 'id', 'categoria_id');


}
}
