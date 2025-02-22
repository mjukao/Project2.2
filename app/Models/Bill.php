<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['table_number', 'total', 'status'];

    public function items()
    {
        return $this->hasMany(BillItem::class);
    }
}
