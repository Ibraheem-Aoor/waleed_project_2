<?php

namespace App\Transformers;

use App\Models\Project;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    /**
     * @param \App\Project $project
     * @return array
     */
    public function transform(Project $project): array
    {
        return [
            'company_name'       => $project->company_name,
            'license_number'    => $project->license_number,
            'owner'     => $project->owner,
            'type'     => $project->type->name,
            'sector'     => $project->sector->name,
            'actions'     => $this->getActionBtns($project),
            'created_at'    =>  Carbon::parse($project->created_at)->toDateTimeString(),
        ];
    }

    public function getActionBtns($project)
    {
        return "<div class='d-flex'>
        <a class='btn-xs btn-success' href='".route('admin.project.edit' , $project->id)."'><i class='fa fa-edit'></i></a> &nbsp;
        <button type='button' class='btn-xs btn-danger' data-toggle='modal' data-target='#delete-modal'
        data-delete-url='".route('admin.project.destroy' , $project->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$project->name."' id='row-".$project->id."'><i class='fa fa-trash'></i></button>
        </div>";
    }
}
