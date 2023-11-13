<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'be_categories';
    protected $primaryKey = 'cate_id';
    protected $guarded =[];
}
