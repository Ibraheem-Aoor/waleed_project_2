<?php

namespace App\Transformers;

use App\Transformers;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class CrudTransfromer extends TransformerAbstract
{


    protected $model_class;
    public function __construct($model_class)
    {
        $this->model_class = $model_class;

    }


    /**
     * @param \App\CrudTransfromer $crudTransfromer
     * @return array
     */
    public function transform($model): array
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'created_at' => Carbon::parse($model->created_at)->toDateTimeString(),
            'action' => "<div class='d-flex'><button class='btn-xs btn-success' data-toggle='modal' data-target='#create-edit-modal' data-name='".$model->name."' data-form-action='".route('admin.project-related-crud.update' , $model->id)."?model=".$this->model_class."' data-is-create='0'><i class='fa fa-edit'></i></button> &nbsp;
                <button class='btn-xs btn-danger' data-toggle='modal' data-target='#delete-modal'
                data-delete-url='".route('admin.project-related-crud.destroy' , $model->id)."?model=".$this->model_class."' id='row-".$model->id."' data-model='".$this->model_class."' data-message='".__('custom.confirm_delete')."' data-name='".$model->name."'><i class='fa fa-trash'></i></button> &nbsp; </div>"
        ];
    }

}



