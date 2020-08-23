<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  protected $fillable=['titulo','descripcion','url_image','texto_boton','url_boton','estilo_boton','estado','orden'];
}
