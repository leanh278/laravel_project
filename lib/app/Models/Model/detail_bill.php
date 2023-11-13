<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_bill extends Model
{
    protected $table = 'detail_order';
    protected $primaryKey = 'dtail_id';
    protected $guarded =[];
}
