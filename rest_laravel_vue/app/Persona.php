<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    //
    protected $fillable = ['Nombre','Edad','Password','Email','Telefono','Estado_id'];
}
