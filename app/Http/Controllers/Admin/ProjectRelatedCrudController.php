<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConsultantClientDelegatorRequest;
use App\Http\Requests\Admin\UpdateConsultantClientDelegatorRequest;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\Contractor;
use App\Models\Delegator;
use App\Models\ProjectAction;
use App\Models\ProjectArea;
use App\Models\ProjectBoard;
use App\Models\ProjectSector;
use App\Models\ProjectType;
use App\Transformers\CrudTransfromer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class ProjectRelatedCrudController extends Controller
{

    protected $model;
    protected $model_name;
    public $translated_model_name;
    public function __construct(Request $request)
    {
        app()->setLocale('ar');
        $this->model_name = $request->model;
        if($this->model_name != null)
        {
            if($this->model_name == 'ProjectType')
            {
                $this->model = new ProjectType;
                $this->translated_model_name = 'أنواع التعهدات';
            }elseif($this->model_name == 'ProjectBoard')
            {
                $this->model = new ProjectBoard;
                $this->translated_model_name = 'اللجنة';
            }elseif($this->model_name == 'ProjectArea'){
                $this->model = new ProjectArea;
                $this->translated_model_name = 'المناطق';
            }elseif($this->model_name == 'ProjectAction'){
                $this->model = new ProjectAction;
                $this->translated_model_name = 'الإجراءات المتخذة';
            }elseif($this->model_name == 'ProjectSector'){
                $this->model = new ProjectSector;
                $this->translated_model_name = 'القطاع';
            }
        }else{
            return back();
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['model'] = $this->model_name;
        $data['translated_model_name' ] =   $this->translated_model_name;
        return view('admin.crud.index' , $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultantClientDelegatorRequest $request)
    {
        try{
            $this->model->create($request->toArray());
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['reload_table']     =    true;
            $response_data['modal_to_hide']     =    '#create-edit-modal';
            $erro_no = 200;
        }
        catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage();#__('custom.smth_wrong');
            $erro_no = 500;
        }
        return response()->json($response_data , $erro_no);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsultantClientDelegatorRequest $request, $id)
    {
        try
        {
            $updated_recored = $this->model->find($id);
            $updated_recored->update($request->toArray());
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update_success');
            $response_data['updated_recored'] = $updated_recored;
            $response_data['modal_to_hide']     =    '#create-edit-modal';
            $response_data['reload_table']     =    true;
            $response_data['row'] = $id;
            $error_no = 200;
        }
        catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $target = $this->model->findOrFail($id);
            $target->delete();
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        }
        catch(Throwable $e)
        {
            dd($e);
            $respnse_data['message'] = __('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }



    /**
     * get the table data
     */

    public function getTableData()
    {
        return DataTables::of($this->model->query())
                ->setTransformer(new CrudTransfromer($this->model_name))
                ->make(true);
    }
}
