<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Warehouse;


class Good extends Model
{
    use HasFactory;
    protected $fillable = [
        'warehouse_id',
        'nama',
        'harga',
    ];
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
