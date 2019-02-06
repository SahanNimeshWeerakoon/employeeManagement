<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\Perks;
use App\Leave;
use App\Task;
use App\Attendence;
use App\DeletedUser;
use Auth;

class PagesController extends Controller
{
    public $attendence = '';
    public function __construct() {
        $this->middleware('auth', ['except' => ['home']]);
    }

    // =================================================== FRONT END CONTROLLER FUNCTIONS ===============================================================
    public function team() {
        return view('pages.team');
    }
    public function clients() {
        return view('pages.clients');
    }
    public function about() {
        return view('pages.about');
    }


    // =================================================== BACK END CONTROLLER FUNCTIONS ===============================================================

    public function home() {
        // return view('home');
        return redirect('login');
    }

    // Employee
    public function getAttendenceDetails($date, $userid) {        
        $attendence = Attendence::where('date', $date)->where('employee_id', $userid)->get();
        return $attendence;
    }
    public function empDashboard() {
        $id = Auth()->user()->id;
        // Authentication of the user
        $user = User::find($id);
        if($user->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }
        
        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d');

        $attendencetest = $this->getAttendenceDetails($date, $id);

        return view('employee.dashboard')->with(['user'=>$user, 'attendencetest'=>$attendencetest]);
    }
    public function empTasks() {
        $id = Auth()->user()->id;
        // Authentication of the user
        $user = User::find($id);
        if($user->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d');

        $attendencetest = $this->getAttendenceDetails($date, $id);

        $tasks = Task::where('employee_id', $id)->orderBy('updated_at', 'desc')->paginate(10);
        return view('employee.tasks')->with(['id' => $id, 'tasks' => $tasks, 'attendencetest'=>$attendencetest]);
    }
    public function requestLeave() {
        $id = Auth()->user()->id;
        // Authentication of the user
        $user = User::find($id);
        if($user->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }
        $leaves = Leave::where('employee_id', $id)->orderBy('created_at', 'desc')->paginate(10);

        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d');

        $attendencetest = $this->getAttendenceDetails($date, $id);

        return view('employee.requestleave')->with(['leaves' => $leaves, 'id' => $id, 'attendencetest'=>$attendencetest]);
    }
    public function myPerks() {
        // Authentication of the user
        $id = Auth()->user()->id;
        $user = User::find($id);
        if($user->status == 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d');

        $attendencetest = $this->getAttendenceDetails($date, $id);        

        $perks = Perks::where('employee_id', Auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('employee.perks')->with(['perks'=>$perks, 'attendencetest'=>$attendencetest]);
    }
    public function randomPage() {
        return view('employee.random');
    }


    // Admin
    public function adminDashboard() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $users = User::where('status', 0)->orderBy('created_at', 'desc')->paginate(10);
        $empNo = count(User::where('status', 0)->get());
        $departmentNo = count(Department::all());
        return view('admin.dashboard')->with(['empno'=>$empNo, 'departmentNo' => $departmentNo, 'users'=>$users]);
    }
    public function addEmployeeView() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $departments = Department::orderBy('id')->get();
        $departmentArrayForDropDown = [];
        foreach($departments as $department) {
            $departmentArrayForDropDown[$department->id] = $department->department_name;
        }
        return view('admin.addemployee')->with('departments',$departmentArrayForDropDown);
    }
    public function addDepartmentView() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        return view('admin.adddepartment');
    }
    public function addPerkView(){
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $users = User::where('status', '!=', 1)->get();
        $perks = Perks::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.addperks')->with(['perks'=>$perks, 'users'=>$users]);
    }
    public function addTask() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $tasks = Task::orderBy('updated_at', 'desc')->paginate(10);
        $users = User::where('status', '!=', 1)->get();
        return view('admin.addtask')->with(['tasks'=>$tasks, 'users'=>$users]);
    }
    public function leaveControl() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $leaves = Leave::orderBy('updated_at', 'desc')->where('status', 0)->paginate(10);
        return view('admin.leavecontrol')->with('leaves', $leaves);
    }
    public function payroll() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $users = User::where('status', '!=', 1)->get();
        $total = '';
        return view('admin.payroll')->with(['getusers'=>$users, 'total'=>$total]);
        // return view('admin.payroll');
    }
    public function seeAttendence() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        date_default_timezone_set('Asia/Colombo');
        $date = date('Y-m-d', time());
        $attendences = Attendence::whereDate('date', $date)->paginate(10);
        return view('admin.seeattendence')->with('attendences', $attendences);
    }
    public function editEmployee($id) {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $user = User::find($id);
        $departments = Department::orderBy('id')->get();
        $departmentArrayForDropDown = [];
        foreach($departments as $department) {
            $departmentArrayForDropDown[$department->id] = $department->department_name;
        }
        return view('admin.editemployee')->with(['departments'=>$departmentArrayForDropDown, 'user' => $user]);
    }
    public function payDetailsSearch() {
        $users = User::where('status', '!=', 1)->get();
        return view('admin.paydetailssearch')->with('users',$users);
    }
    public function removedEmployees() {
        // Authentication of the user
        $user_id = Auth()->user()->id;
        $usertest = User::find($user_id);
        if($usertest->status != 1) {
            return redirect('login')->with('error', 'Access Denied');
        }

        $deletedUsers = DeletedUser::all();
        // return $deletedUsers;
        return view('admin.removedemployees')->with(['deletedUsers'=>$deletedUsers]);
    }
    public function viewDeleted($id) {
        $deletedUser = DeletedUser::find($id);
        $department = Department::find($deletedUser->department_id);
        return view('admin.viewdeleted')->with(['deletedUser'=>$deletedUser, 'department'=>$department]);
    }
}
