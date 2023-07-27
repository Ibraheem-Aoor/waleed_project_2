<?php

namespace App\Models;

use App\Enums\BasePaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaseProjectRelatedModel extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


}
