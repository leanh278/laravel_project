<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table = 'order_bill';
    protected $primaryKey = 'bill_id';
    protected $guarded =[];
}
