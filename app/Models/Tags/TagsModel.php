<?php

namespace App\Models\Tags;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
