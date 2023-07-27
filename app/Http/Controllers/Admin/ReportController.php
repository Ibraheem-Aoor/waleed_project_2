<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportExport;
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
use App\Transformers\ReportTransformer;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;
use PDF;
use Excel;
class ReportController extends Controller
{

    public $table_data_url;

    public function __construct()
    {
        app()->setLocale('ar');
        $this->table_data_url = route('admin.report.table-data');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url'] = $this->table_data_url;
        $data['types']          =   ProjectType::query()->pluck('name' , 'id')->toArray();
        $data['areas']          =   ProjectArea::query()->pluck('name' , 'id')->toArray();
        $data['sectors']        =   ProjectSector::query()->pluck('name' , 'id')->toArray();
        $data['actions']        =   ProjectAction::query()->pluck('name' , 'id')->toArray();
        return view('admin.report.index' , $data);
    }



    /**
     * get the table data
     * @return DataTables
     */
    public function getTableData(Request $request)
    {
        $filters    =   $request->toArray() ?? [];
        $data  = Project::query()->where(function($query)use($filters){
            $query->when(@$filters['type'] , function($q)use($filters){
                $q->where('type_id' , $filters['type']);
            });
            $query->when(@$filters['area'] , function($q)use($filters){
                $q->where('area_id' , $filters['area']);
            });
            $query->when(@$filters['action'] , function($q)use($filters){
                $q->where('action_id' , $filters['action']);
            });
            $query->when(@$filters['sector'] , function($q)use($filters){
                $q->where('sector_id' , $filters['sector']);
            });
            $query->when(@$filters['start_date'] , function($q)use($filters){
                $q->whereDate('start_date' , $filters['start_date'] );
            });
            $query->when(@$filters['end_date'] , function($q)use($filters){
                $q->whereDate('end_date' , $filters['end_date'] );
            });
        })->get();
        return DataTables::of($data)
                ->setTransformer(ReportTransformer::class)
                ->make(true);
    }



    /**
     * Print Excel
     */
    public function printExcel(Request $request)
    {
        try{

            if($projects = $request->id)
            {
                $date_time      =   Carbon::today()->toDateTimeString();
                return Excel::download(new ReportExport($projects) , 'report_'.$date_time.'.xlsx');
            }else{
                return back();
            }
        }catch(Throwable $e)
        {
            dd($e);
            return back();
        }
    }


}
