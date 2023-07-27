<?php

namespace App\Http\Controllers\Aadmin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\Contractor;
use App\Models\DelegateTransaction;
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
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{

    public function dashboard()
    {
        $data['project_count']      = Project::query()->count();
        $data['areas_count']         = ProjectArea::query()->count();
        $data['types_count']         = ProjectType::query()->count();
        $data['sectors_count']       = ProjectSector::query()->count();
        $data['boards_count']       = ProjectBoard::query()->count();
        $data['actions_count']       = ProjectAction::query()->count();
        $data['table_data_url']     =   route('admin.dashboard.projects_table_date');
        return view('admin.dashboard' , $data);
    }



    public function getTableData()
    {
        return DataTables::of(Project::query()->whereDate('end_date' , '>' ,  Carbon::today()->addDays(5))->whereNull('action_id'))->setTransformer(ProjectTransformer::class)->make(true);
    }

}
