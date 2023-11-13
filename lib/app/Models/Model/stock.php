<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'stock_id';
    protected $guarded =[];
}
