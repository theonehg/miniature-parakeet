    <?php

    namespace App\Http\Controllers\SubLeader;

    use App\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Auth;
    use App\statuses; 
    use App\User;

    use App\priorities;

    class ShowIndividualRequestController extends Controller
    {
         public function index()
        {
      // lay id cua user_logined.
            $id = Auth::user()->id;

            $data = requests::join('priorities','requests.priority_id','=','priorities.id')->join('users as a','requests.created_by','=','a.id')->join('users as b','requests.assigned_to','=','b.id')->join('statuses','requests.status_id','=','statuses.id')->select('requests.id as id','subject','priorities.name as priority','a.fullname as create_by','b.fullname as assigned_to','deadline_at','statuses.name as status')->where('a.id','=',$id)->get();
            //$data = tickets::join('priority','tickets.priority_id','=','priority.id')->join('users as a','tickets.created_by','=','a.id')->join('users as b','tickets.assigned_to_id','=','b.id')->join('status','tickets.status_id','=','status.id')->select('tickets.id as id','subject','created_at','priority.name_priority as priority','a.employee_name as employee_cre','b.employee_name as employee_assi','deadline','status.name_status as status')->where('a.id','=',$id)->orderBy('created_at','desc')->get();
    //        $data = requests::get();
            dd($data);
            return view('database_manager.show_list_congviecyeucau.show_subleader')->with([
                'indi_data' => $data
            ]);
        }
        public function new(){
            $id = Auth::user()->id;
            $data = join('priorities','requests.priority_id','=','priorities.id')->join('users as a','requests.created_by','=','a.id')->join('users as b','requests.assigned_to','=','b.id')->join('statuses','requests.status_id','=','statuses.id')->select('requests.id as id','subject','priorities.name as priority','a.fullname as create_by','b.fullname as assigned_to','deadline_at','statuses.name as status')->where('a.id','=',$id)->where('requests.status_id','=',1)->get();
            return view('database_manager.show_list_congviecyeucau.show_subleader')->with([
                'indi_data' => $data
            ]);
        }
        public function inprogress (){
            $id = Auth::user()->id;
            $data = join('priorities','requests.priority_id','=','priorities.id')->join('users as a','requests.created_by','=','a.id')->join('users as b','requests.assigned_to','=','b.id')->join('statuses','requests.status_id','=','statuses.id')->select('requests.id as id','subject','priorities.name as priority','a.fullname as create_by','b.fullname as assigned_to','deadline_at','statuses.name as status')->where('a.id','=',$id)->where('requests.status_id','=',2)->get();
            return view('database_manager.show_list_congviecyeucau.show_subleader')->with([
                'indi_data' => $data
            ]);
        }
        public function resolved (){
            $id = Auth::user()->id;
            $data = join('priorities','requests.priority_id','=','priorities.id')->join('users as a','requests.created_by','=','a.id')->join('users as b','requests.assigned_to','=','b.id')->join('statuses','requests.status_id','=','statuses.id')->select('requests.id as id','subject','priorities.name as priority','a.fullname as create_by','b.fullname as assigned_to','deadline_at','statuses.name as status')->where('a.id','=',$id)->where('requests.status_id','=',3)->get();
            return view('database_manager.show_list_congviecyeucau.show_subleader')->with([
                'indi_data' => $data
            ]);

        }
        public function outofdate (){
        $id = Auth::user()->id;
            $curTime = Carbon::now();
            $data = join('priorities','requests.priority_id','=','priorities.id')->join('users as a','requests.created_by','=','a.id')->join('users as b','requests.assigned_to','=','b.id')->join('statuses','requests.status_id','=','statuses.id')->select('requests.id as id','subject','priorities.name as priority','a.fullname as create_by','b.fullname as assigned_to','deadline_at','statuses.name as status')->where('a.id','=',$id)->where('requests.status_id','<>',5)->where('requests.deadline_at','<',$curTime)->where('requests.status_id','<>',6)->get();

            return view('database_manager.show_list_congviecyeucau.show_subleader')->with([
                'indi_data' => $data
            ]);

        }

        
    }
