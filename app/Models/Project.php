<?php

namespace App\Models;

use App\Enums\BasePaymentStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['type'  , 'sector' , 'area' , 'action'];


    ############## START RELATIONS ###############
    public function type() : BelongsTo
    {
        return $this->belongsTo(ProjectType::class , 'type_id');
    }
    public function sector() : BelongsTo
    {
        return $this->belongsTo(ProjectSector::class , 'sector_id');
    }
    public function area() : BelongsTo
    {
        return $this->belongsTo(ProjectArea::class , 'area_id');
    }
    public function action() : BelongsTo
    {
        return $this->belongsTo(ProjectAction::class , 'action_id');
    }
    ############## END RELATIONS ###############



    public function getPhaseInDays()
    {
        $start_date =   Carbon::parse($this->start_date);
        $end_date =   Carbon::parse($this->end_date);
        return $end_date->diffInDays($start_date);
    }



}
