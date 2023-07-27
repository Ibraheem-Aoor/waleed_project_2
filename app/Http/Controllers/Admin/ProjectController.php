<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProjectRequest;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\Contractor;
use App\Models\Delegator;
use App\Models\Project;
use App\Models\ProjectAction;
use App\Models\ProjectArea;
use App\Models\ProjectBoard;
use App\Models\ProjectSector;
use App\Models\ProjectType;
use App\Transformers\ProjectTransformer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;
use PDF;
class ProjectController extends Controller
{

    public function __construct()
    {
        app()->setLocale('ar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = route('admin.project.table-data');
        return view('admin.project.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['areas'] = ProjectArea::all();
        $data['sectors'] = ProjectSector::all();
        $data['types'] = ProjectType::all();
        $data['boards'] = ProjectBoard::all();
        $data['actions']    =   ProjectAction::all();
        $data['form_method'] =   'POST';
        $data['form_route'] = route('admin.project.store');
        return view('admin.project.create',  $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        try{
            Project::create($request->toArray());
            $response_data['status'] = true;
            $response_data['reset_form'] = true;
            $response_data['message'] = __('custom.create_success');
            $error_no = 200;
        }
        catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = $e->getMessage(); #__('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($response_data, $error_no);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['project'] = Project::query()->findOrFail($id);
        $data['areas'] = ProjectArea::all();
        $data['sectors'] = ProjectSector::all();
        $data['types'] = ProjectType::all();
        $data['boards'] = ProjectBoard::all();
        $data['actions']    =   ProjectAction::all();
        $data['form_route'] = route('admin.project.update' , $id);
        $data['form_method'] = "PUT";
        return view('admin.project.create' , $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProjectRequest $request, $id)
    {
        try{
            $project = Project::findOrFail($id);
            $project->update($request->toArray());
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update_success');
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
            Project::query()->find($id)->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        }
        catch(Throwable $e)
        {
            $respnse_data['message'] = $e->getMessage(); #__('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }


    /**
     * get the table data
     * @return DataTables
     */
    public function getTableData()
    {
        return DataTables::of(Project::query()->with(['type' , 'sector']))
                ->setTransformer(ProjectTransformer::class)
                ->make(true);
    }


    /**
     * Print The Pdf Details of the given project
     * @param mixed $id
     * @return void
     */
    public function printProjectPdf($id)
    {
        $data['project'] = Project::query()->findOrFail($id);
        $data['text_direction'] =   app()->getLocale() == 'ar' ? 'text-right' : 'text-left';
        $pdf = PDF::loadView('admin.project.pdf' , $data);
        return $pdf->download($data['project']->name .'-'.__('custom.project_details'));
    }

    public function printDelgatorTransactionPdf($id)
    {
        $data['project'] = Project::query()->findOrFail($id);
        $data['text_direction'] =   app()->getLocale() == 'ar' ? 'text-right' : 'text-left';
        $pdf = PDF::loadView('admin.project.delegator-transactions-pdf' , $data);
        return $pdf->download($data['project']->name .'-'.__('custom.sidebar.delegate_transactions'));
    }


    public function printApplicationFeePdf($id)
    {
        $data['project'] = Project::query()->findOrFail($id);
        $data['text_direction'] =   app()->getLocale() == 'ar' ? 'text-right' : 'text-left';
        $pdf = PDF::loadView('admin.project.application-fee-pdf' , $data);
        return $pdf->download($data['project']->name .'-'.__('custom.sidebar.application_fees'));
    }

    public function prinrTenderPdf($id)
    {
        $data['project'] = Project::query()->findOrFail($id);
        $data['text_direction'] =   app()->getLocale() == 'ar' ? 'text-right' : 'text-left';
        $pdf = PDF::loadView('admin.project.tenders-pdf' , $data);
        return $pdf->download($data['project']->name .'-'.__('custom.sidebar.tenders'));
    }


}
