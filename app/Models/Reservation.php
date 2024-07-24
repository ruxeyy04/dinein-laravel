<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $table = 'reservation';
    protected $primaryKey = 'resno';

    protected $fillable = [
        'table_no',
        'userid',
        'datetimesched',
        'status',
    ];

    // Define relationships
    public function table()
    {
        return $this->belongsTo(Table::class, 'table_no', 'table_no');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    }
}
