<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public function getCompensationPerKm(Employee $employee) {
        $transportName = $employee->transport->name;
        if($transportName === 'Bike' && $employee->distance_from_work >=5 && $employee->distance_from_work <= 10){
            return $employee->transport->compensation_per_km * 2;
        }

        return $transportCompensation = $employee->transport->compensation_per_km;
    }
}
