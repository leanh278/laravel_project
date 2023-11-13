<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'be_products';
    protected $primaryKey = 'prod_id';
    protected $guarded =[];
}
