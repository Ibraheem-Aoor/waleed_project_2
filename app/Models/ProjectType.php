<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends BaseProjectRelatedModel
{
    use HasFactory;

    protected $fillable = ['name'];
}
