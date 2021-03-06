<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_name',
        'division_id',
        'status',
    ];


      /**
     * Get the Division name that owns the districts comment.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
