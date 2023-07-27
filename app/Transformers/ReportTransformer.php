<?php

namespace App\Transformers;

use App\Models\Project;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ReportTransformer extends TransformerAbstract
{
    /**
     * @param \App\Project $project
     * @return array
     */
    public function transform(Project $project): array
    {
        return [
            'checkbox'                  =>  "<input type='checkbox' name='id[]' value='".(int)$project->id."'>",
            'company_name'              => $project->company_name,
            'license_number'            => $project->license_number,
            'owner'                     => $project->owner,
            'type'                      => $project->type?->name,
            'area'                      => $project->area?->name,
            'sector'                    => $project->sector?->name,
            'start_date'                   => $project->start_date,
            'phase'                     => $project->getPhaseInDays(),
            'end_date'                    => $project->end_date,
            'action'                    => $project->action?->name ?? '<span class="text-danger">لم يتم بعد</span>',
            'created_at'                =>  Carbon::parse($project->created_at)->toDateTimeString(),
        ];
    }

}
