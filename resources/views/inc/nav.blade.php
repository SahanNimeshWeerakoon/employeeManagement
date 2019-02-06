<nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @if (Auth::user()->status == 1)
                <li>
                    <a href="/addperk">Add Perk</a>
                </li>
                <li>
                    <a href="/seeattendence">Attendence</a>
                </li>
                <li>
                    <a href="/leavecontrol">Leave Requests</a>
                </li>
                <li>
                    <a href="/addtask">Add Task</a>
                </li>
                <li>
                    <a href="/payroll">Create Payroll</a>
                </li>
                <li>
                    <a href="/paydetailssearch">Search Payroll</a>
                </li>
                <li>
                    <a href="/admindashboard">Dashboard</a>
                </li>
                <li>
                    <a href="/removedemployees">Removed Employees</a>
                </li>
            @else
                <li>
                    <a href="/seetasks">Tasks</a>
                </li>
                <li>
                    <a href="/requestleave">Request Leaves</a>
                </li>
                <li>
                    <a href="/myperks">My Perks</a>
                </li>
                <li>
                    <a href="/employeedashboard">Employee Dashboard</a>
                </li>
            @endif
        </ul>
        {{-- <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form> --}}
        <ul class="nav navbar-nav navbar-right">
            <div class="row">
                <div class="col-md-6" style="margin-top: 0.5em;">
                    @if (Auth::user()->status != 1)
                        @if (count($attendencetest)>0)
                                <form action="/markattendence/{{ Auth::user()->id }}" method="POST">
                                    @csrf
                                    {{ Form::submit('Time Out', ['class'=>'btn btn-primary']) }}
                                </form>
                        @else
                        <form action="/markattendence/{{ Auth::user()->id }}" method="POST">
                            @csrf
                            {{ Form::submit('Time In', ['class'=>'btn btn-primary']) }}
                        </form>
                        @endif
                    @endif

                    
                </div>
                <div class="col-md-6">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="height: 100%;">
                        @csrf
                        <input type="submit" value="Logout" class="btn btn-danger float-right" style="margin-top: 7px;">
                    </form>
                </div>
            </div>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>