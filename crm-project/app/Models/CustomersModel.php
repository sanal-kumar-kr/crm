<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class CustomersModel extends Model
{
    //
    use HasFactory;
    protected $table='customers';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'group',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
