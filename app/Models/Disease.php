<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'strain',
        'onset',
        'origin',
        'symptoms',
        'treatment'
    ];

    public function infection(){
       return $this->hasOne(Tracker::class, 'disease_id', 'id');
    }
}
