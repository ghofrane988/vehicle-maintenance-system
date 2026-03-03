<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'employee_id',
        'date_debut',
        'date_fin',
        'km_debut',
        'km_fin',
        'statut'
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
}
