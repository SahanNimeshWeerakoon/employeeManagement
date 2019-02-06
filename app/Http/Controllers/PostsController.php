<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Perks;
use App\Leave;
use App\Task;
use App\Attendence;
use App\Payroll;
use App\DeletedUser;
use Auth;
use DB;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    // Add An Employee
    public function addEmployee(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'date' => 'required',
            'department_id' => 'required',
            'email' => 'required|email',
            'nic' => 'required|max:10|min:10',
            'username' => 'required',
            'password' => 'required|confirmed',
            'basic_salary' => 'required',
            'travel' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->date_joined = $request->date;
        $user->department_id = $request->department_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->basic_salary = $request->basic_salary;
        $user->transport_allowances = $request->travel;
        $user->nic = $request->nic;
        $user->morning_mark = 0;
        $user->save();

        return redirect('admindashboard');
    }

    // Login function 
    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = $request->only('username', 'password');

        if(Auth::attempt($data)) {
            $user = User::find(Auth::id());
            if($user->status == 1){
                return redirect('admindashboard');
            }
            return redirect('employeedashboard');
        }
    }

    //Add Department function
    public function addDepartment(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'department' => 'required',
        ]);
        
        $department = new Department();
        $department->department_name = $request->department;
        $department->save();
        return redirect('admindashboard');
    }

    // Add Perk Function
    public function addPerk(Request $request) {
        date_default_timezone_set('Asia/Colombo');
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'userid' => 'required',
            'description' => 'required'
        ]);

        date_default_timezone_set('Asia/Colombo');

        // $employeeName = User::find((int)$request->userid)->name;
        $employeeId = User::where('name', $request->userid)->get()[0]->id;

        $perk = new Perks();
        $perk->employee_id = $employeeId;
        $perk->perk_description = $request->description;
        $perk->name = $request->userid;
        $perk->save();
        return redirect('addperk');
    }

    // Add Request a Leave Function
    public function requestLeave(Request $request) {
        // Authentication of the user
        $id = Auth()->user()->id;
        $user = User::find($id);
        if($user->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'reason' => 'required',
            'from' => 'date|required',
            'to' => 'date|required'
        ]);

        $user_name = User::find(Auth()->user()->id)->name;

        $leave = new Leave();
        $leave->reason = $request->reason;
        $leave->employee_id = Auth()->user()->id;
        $leave->status = 0;
        $leave->name = $user_name;
        $leave->date_from = $request->from;
        $leave->date_to = $request->to;
        $leave->save();

        return redirect('/requestleave');
    }

    // Add a Task Function
    public function addTask(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'empid' => 'required'
        ]);

        $user_id = User::where('name', $request->empid)->get()[0]->id;

        $task = new Task();
        $task->task_title = $request->title;
        $task->task_description = $request->description;
        $task->employee_id = $user_id;
        $task->name = $request->empid;
        $task->status = 0;
        $task->save();

        return redirect('addtask');
    }

    // Employee Submit Task Function
    public function empTask(Request $request) {
        // Authentication of the user
        $id = Auth()->user()->id;
        $user = User::find($id);
        if($user->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $task = Task::find($request->id);
        $task->status = 1;
        $task->save();
        return redirect('seetasks');
    }

    // Confirm Leave function
    public function confirmLeave(Request $request, $leave_id) {
        // Authentication of the user
        $id = Auth()->user()->id;
        $user = User::find($id);
        if($user->status != 1) {
            return 'this is not an admin';
            return redirect('login')->with('error', 'Access Denied');
        } else {
            $leave = Leave::find($leave_id);
            $leave->status = 1;
            $leave->save();
            return redirect('leavecontrol');
        }

    }

    // Reject Leave function
    public function rejectLeave(Request $request, $leave_id) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $leave = Leave::find($leave_id);
        $leave->status = 2;
        $leave->save();
        
        return redirect('leavecontrol');
    }
    
    // Add Payroll function
    public function payroll(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'emp_id' => 'required',
            'basic_salary' => 'required',
            'transport' => 'required',
            'epf' => 'required',
            'etf' => 'required',
            'total' => 'required',
        ]);
        date_default_timezone_set('Asia/Colombo');
        $payroll = new Payroll();
        $payroll->basic_salary = $request->basic_salary;
        $payroll->transport_allowences = $request->transport;
        $payroll->epf = $request->epf;
        $payroll->etf = $request->etf;
        $payroll->employee_id = $request->emp_id;
        $payroll->year = date('Y');
        $payroll->month = date('m');
        $payroll->date = date('Y-m-d');
        $payroll->total_salary = $request->total;
        $payroll->save();
        return redirect('admindashboard');
    }

    // Get The Payroll Data By Entering The Employees' ID Function
    public function getData(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'empid' => 'required'
        ]);
        $user = User::where('name', $request->empid)->get()[0];
        $getusers = User::where('status', '!=', 1)->get();
        if(!$user) {
            return redirect('payroll');
        }
        $total = (int)$user->basic_salary + (int)$user->transport_allowances - ((int)$user->basic_salary*0.03);
        
        return view('admin.payroll')->with(['user'=>$user, 'total'=>$total, 'getusers'=>$getusers]);
    }

    // Mark Attendence Function
    public function markAttendence(Request $request, $id) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        // Setting timezone to get the current date
        date_default_timezone_set('Asia/Colombo');
        // Getting the current time Hours:Minutes:seconds and date in Years:Months:days
        $time = date('h:i', time());
        $date = date('Y-m-d', time());
        // check if the user is having an attendence entry for current date.
        $attendence = Attendence::where('date', $date)->where('employee_id', Auth()->user()->id)->get();
        // Checking whether this is the first attendence entrance
        if(count($attendence)==0){
            // if so start a new object of eloquent
            $attendence = new Attendence();
        } else {
            /*
            * Checking whether the time_in is set for the current date.
            * If time_in is not set it is a morning entrance and have to update time_in field too
            * If time_in is set this is an evening entrance so have to update time_out field
            */
            if($attendence[0]->time_in){
                // If the time_in is set update time_out field in attendences table and save
                $attendence[0]->time_out = $time;
                $attendence[0]->attendence = 1;
                $attendence[0]->save();

                /**
                 * In Employee dashboard if it's a time_in attendence only the time in button is displayed
                 * if it's a time_out attendence only the time out button is displayed
                 * this function is done by the morning_mark field in users table.
                 * If it's value is 0 it means that employee update the time_out attendence last time
                 * if it's value is 1 it means that employee update the time_in attendence last time
                 * in here time_in is checked so current morning mark is 1
                 * so have to update it here to 0
                 */
                $user = User::find(Auth()->user()->id);
                $user->morning_mark=0;
                $user->save();

                return redirect('employeedashboard');
            } else {
                // If the time_in is not updated which means this is a new day and have to start a new entry
                $attendence = new Attendence();
            }
        }
        // when the code comes to here it means that this is not a time_out entry and this is a time_in entry which is a new entry. 
        $attendence->employee_id = Auth()->user()->id;
        $attendence->date = $date;
        $attendence->time_in = $time;
        $attendence->attendence = 0;
        $attendence->name=$usertest->name;
        $attendence->save();
        
        // since this is an entry of morning session have to update the morning_mark field to 1
        $user = User::find(Auth()->user()->id);
        $user->morning_mark=1;
        $user->save();

        return redirect('employeedashboard');

    }

    // Search Results Function
    public function searchResult(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'emp_id' => 'required'
        ]);
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d', time());
        $user = User::find($request->emp_id);
        // If a user is not selected here which means user with that id is not there in the database
        if(!$user) {
            return view('notfound')->with(['notfound' => 'user']);
        }
        $department = Department::find((int)$user->department_id);
        // If any department is not selected which means user's department id is 0 and thats only for Admins
        if(!$department) {
            return view('notfound')->with(['notfound' => 'admin']);
        }
        $attendence = Attendence::where('date', $date)->where('employee_id', $request->emp_id)->get();
        // Setting the attendence Present of Absent
        if( count($attendence) == 1 ){
            $attendence = 'Present';
        } else {
            $attendence = 'Absent';
        }
        $perks = count(Perks::where('employee_id', $request->emp_id)->get());
        $tasksCompleted = count(Task::where('employee_id', $request->emp_id)->where('status', 1)->get());
        $tasksIncompleted = count(Task::where('employee_id', $request->emp_id)->where('status', '!=', 1)->get());
        
        
        return view('admin.search')->with(
            [
                'user'=>$user, 'department'=>$department, 'attendence'=>$attendence, 'perks'=>$perks, 'tasksCompleted'=>$tasksCompleted, 
                'tasksIncompleted'=> $tasksIncompleted
            ]
        );
    }

    // Delete Employee Function
    public function delete(Request $request, $id) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        // Finding the user with the requested ID
        $user = User::find($id);

        // Saving the deleting user details in the deleted_users table
        $deletedUser = new DeletedUser();
        $deletedUser->name = $user->name;
        $deletedUser->contact = $user->contact;
        $deletedUser->address = $user->address;
        $deletedUser->date_joined = $user->date_joined;
        $deletedUser->department_id = $user->department_id;
        $deletedUser->username = $user->username;
        $deletedUser->email = $user->email;
        $deletedUser->status = $user->status;
        $deletedUser->save();

        // Deleting the user from the user table
        $user->delete();
        return redirect('admindashboard');
    }

    // Edit Employee Function 
    public function editEmployee(Request $request, $id) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'date' => 'required',
            'department_id' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'basic_salary' => 'required',
            'travel' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->date_joined = $request->date;
        $user->department_id = $request->department_id;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->basic_salary = $request->basic_salary;
        $user->transport_allowances = $request->travel;
        $user->morning_mark = 0;
        $user->save();

        return redirect('admindashboard');  
    }
    public function attendenceMonth(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'month'=>'required'
        ]);
        date_default_timezone_set('Asia/Colombo');
        $time = strtotime($request->month);
        $month = date('m', $time);
        $total = count(Attendence::whereMonth('date', $month)->get());
        $attendences = Attendence::groupBy('employee_id', 'name')->select('employee_id', 'name' ,DB::raw('count(*) as total'))->whereMonth('date', $month)->get();
        return view('admin.seeattendencemonth')->with(['total'=>$total, 'month'=>$month, 'attendences'=>$attendences]);
    }
    public function attendenceDate(Request $request) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $this->validate($request, [
            'date'=>'required'
        ]);
        date_default_timezone_set('Asia/Colombo');
        $time = strtotime($request->date);
        $date = date('Y-m-d', $time);
        $attendences = Attendence::where('date', $date)->paginate(3);
        return view('admin.seeattendencedate')->with(['attendences'=>$attendences, 'date'=>$date]);;
    }
    public function payrollDetailsView(Request $request) {
        $this->validate($request, [
            'empname'=>'required',
            'from'=>"required",
            'to'=>'required'
        ]);
        
        $from = $request->from;
        $to = $request->to;
        if($from>$to) {
            $from = $request->to;
            $to = $request->from;
        }

        date_default_timezone_set('Asia/Colombo');
        $user = User::where('name', $request->empname)->get();
        $userId = $user[0]->id;
        $details = Payroll::where('employee_id', $userId)->where('date', '>=', $from)->where('date', '<=', $to)->get();

        // return Payroll::where('date', '<=', $to)->get();

        return view('admin.seepayrolldetails')->with(['details'=>$details, 'user'=>$user[0]]);
    }
}