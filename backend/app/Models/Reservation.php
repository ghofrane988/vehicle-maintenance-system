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
        'mission',
        'status'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
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
