<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Puesto extends Model
{
    use HasFactory;
    protected $fillable =['nombre','tipo'];

    protected $table = 'puestos'; // Nombre de la tabla
    protected $primaryKey = 'idPuesto'; // Cambia 'id' por tu clave primaria

    // Si 'alumno_id' no es autoincremental, agrega esto también:
    public $incrementing = false;
    
    // Si 'alumno_id' no es de tipo integer, especifica el tipo de dato:
    protected $keyType = 'string';

    protected static function boot()
     {
         parent::boot();
     
         static::creating(function ($model) {
             if (empty($model->idPuesto)) {
                 $model->idPuesto = substr((string) Str::uuid(), 0, 8);  // Genera un UUID como idPlaza
             }
         });
     }
}
