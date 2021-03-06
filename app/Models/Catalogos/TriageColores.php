<?php

namespace App;

namespace App\Models\Catalogos;
use App\Models\Transacciones\MovimientosIncidencias;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TriageColores extends Model
{
    use SoftDeletes;

    protected $generarID = false;
    protected $guardarIDServidor = false;
    protected $guardarIDUsuario = false;
    public $incrementing = true;

    protected $table = "triage_colores";
    protected $fillable = ["id", "nombre", "descripcion", "tiempo_minimo", "tiempo_maximo"];
    protected $hidden = ["created_at", "updated_at", "deleted_at"];


    public function triageSintomas()
    {
        return $this->belongsToMany(TriageSintomas::class, 'triage_color_triage_sintoma', 'triage_colores_id', 'triage_sintomas_id')
            ->withPivot('nombre');
    }

    public function baseConocimiento()
    {
        return $this->hasMany(TriageColores::class);
    }

    public function movimientos_incidencias()
    {
        return $this->hasMany(MovimientosIncidencias::class);
    }
}
