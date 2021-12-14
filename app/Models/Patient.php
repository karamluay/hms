<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
	 protected $guarded = [];  
     public function stage()
     {
         return $this->belongsTo("App\Models\Stage", 'status');
     }

     /**
      * Get the doctor that owns the Patient
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function doctor()
     {
         return $this->belongsTo("App\Models\User", 'doctor_id');
     }

     /**
      * Get the operation that owns the Patient
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function operation()
     {
         return $this->belongsTo("App\Models\Operation", 'opration_id');
     }
 }

