<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perks;
use App\Task;
use App\DeletedUser;
use DataTables;

class AjaxdataController extends Controller
{
    public function test() {
        return view('test');
    }

    // Viewing all employee details in the admin Dashboard
    public function getData() {
        $users = User::select('id', 'name', 'contact','created_at')->where('status', '!=', 1);
        return DataTables::of($users)
        ->addColumn('action', function($user) {
            return "
                <form action='/search' method='POST'>
                    <input name='_token' type='hidden' value='MGVueIHbI6thuWuS5k8Hc4uVPt87UoipnWdN8T1Y'>
                    <input type='hidden' name='emp_id' value='$user->id' />
                    <input type='submit' value='VIEW' class='btn btn-default' />
                </form>
            ";
        })
        ->make(true);
    }

    // Getting perk details in the addperk page of Admin
    public function getPerks() {
        $perks = Perks::select('employee_id', 'name', 'perk_description', 'created_at');
        return DataTables::of($perks)->make(true);
    }

    // Getting tasks details in the get tasks page of admin
    public function getTasks() {
        $tasks = Task::orderBy('updated_at', 'desc');
        return DataTables::of($tasks)
        ->addColumn('action', function($task) {
            if($task->status == 0) {
                return '<p class="text-info">PENDING</p>';
            }
            if($task->status == 1) {
                return '<p class="text-success">SUCCESS</p>';
            }
        })
        ->make(true);
    }

    // Getting attendence details for the selected data
    public function getAttendenceDate(Request $request) {
        
    }

    // Getting deleted employees with data tables
    public function getDeletedEmployees() {
        $deletedUsers = DeletedUser::all();
        return DataTables::of($deletedUsers)
        ->addColumn('action', function($deletedUser) {
            // return "
            // <form action='/viewDeleted' method='POST'>
            //     <input name='_token' type='hidden' value='MGVueIHbI6thuWuS5k8Hc4uVPt87UoipnWdN8T1Y'>
            //     <input type='hidden' name='emp_id' value='$deletedUser->id' />
            //     <input type='submit' value='VIEW' class='btn btn-default' />
            // </form>
            // ";
            return "
            <a href='/viewDeleted/$deletedUser->id'>VIEW</a>
            ";
        })
        ->make(true);
    }
}
