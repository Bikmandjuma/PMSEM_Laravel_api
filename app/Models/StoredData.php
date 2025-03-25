<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredData extends Model
{
    use HasFactory;
    protected $fillable =[
        'temperature',
        'vibration',
        // 'user_fk_id'
    ];

    // public function userFk()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
