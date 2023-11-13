<?php

namespace App\Models\Model;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partition extends Model
{
    protected $table = 'be_partition';
    protected $primaryKey = 'par_id';
    protected $guarded =[];

}