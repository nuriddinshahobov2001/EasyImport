<?php

namespace App\Models\Models\ProductList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductListModel extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
