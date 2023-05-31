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
        'stok',
    ];
    public function warehouses()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id','id');
    }
}
