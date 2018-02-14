@extends('layouts.master')

@section('title')
Staff Administration
@endsection


@section('content')

    <div class="user-dashboard" style=" min-height:700px;">
        <div class="row">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-settings font-dark"></i> <strong>Staff Panel</strong>  </h3>
                    </div>
                               	<!--- use this one -->
                    <div class="row">
                        <div class="col-md-12">
                         
                        <div class="portlet-body panel">
                            <div class="table-toolbar panel-heading" style="background:#fff">
                                <div class="row" >
                                     <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn btn-primary" data-target="#user" data-tooltip="true" data-toggle="modal" data-placement="top" title="Create new User"> <i class="fa fa-plus"></i> Add User
                                                    
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        @if(Session::has('info'))
                                            <div class="alert alert-success alert-dismissible" role="alert" onload="run()">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                        {{Session::get('info')}}
                                            </div>
                                        @endif
                                    </div>
                                       
								</div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>

                                                    <td>ID</td>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Department</td>
                                                     <td>Phone</td>
                                                    <td> Status</td>
                                                    <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($users as $user)

                                                <tr class="odd gradeX">
                                                   <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td> 

                                                    <td> {{$user->id}} </td>
                                                    <td> {{$user->firstname}} </td>
                                                    <td> {{$user->lastname}} </td>
                                                    <td>
                                                        @foreach($departments as $d)
                                                            @if($user->department_id==$d->id)
                                                                {{$d->name}} 
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                   <td> {{$user->phone}}</td>

                                                    <td>
                                                        @if($user->active==1)
                                                        <span class="label label-sm label-success"> Active </span>
                                                             @else
                                                         <span class="label label-sm label-warning"> Inactive </span>
                                                          @endif 
                                                    </td>
                                                  <!-- command buttons -->
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                                     
                                                                    <a href="javascript:;" onclick="user()" data-tooltip="true" data-placement="top" data-target=".user" data-password="{{$user->password}}" data-email="{{$user->email}}" data-active="{{$user->active}}" data-firstname="{{$user->firstname}}" data-lastname="{{$user->lastname}}" data-phone="{{$user->phone}}" data-roleid="{{$user->role_id}}" data-deptid="{{$user->department_id}}" data-id="{{$user->id}}"  data-toggle="modal" title="Edit User">
                                                                        <i class="fa fa-pencil"></i> Edit User 
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <!-- end of command button -->

                                                </tr>
                                                @endforeach 
                                        </tbody>
                                </table>
                        </div>
                        </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        
                    </div>             
            </div>
        </div>
                            
            <!--- modal create -->
        <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">               	        
                    <form class="form-vertical" method="post" id="createUser">

                        <div class="modal-header " style="background-color: #32c5d2; color: #fff;font-weight:bold">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <h4 class="modal-title custom_align" id="Heading"> <i class="fa fa-info-circle" aria-hidden="true"></i> Create New User</h4>
                        </div>

                            <!-- beginning of modal body -->
                                <div class="modal-body" style="padding:5%">

                                            <div class="form-group">
                                                <label for="name" class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="firstname" required  placeholder="Enter first Name" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label">Last Name</label>
                                                <input type="text" class="form-control" name="lastname" required  placeholder="Enter Last Name" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label">User ID</label>
                                                <input type="text" class="form-control" name="email" required  placeholder="Enter User ID" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label">Telephone</label>
                                                <input type="text" class="form-control" name="phone" required  placeholder="Enter  Telephone" required/>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label">Password</label>
                                                <input type="password" class="form-control" name="password" required  placeholder="Enter  Password" required/>
                                            </div>

                                        <div class="form-group">
                                            <label for="username" class="cols-sm-2 control-label">User Department </label>
                                            <select class="form-control" name="dept_id">
                                                <option value="">Select</option>
                                                @foreach($departments as $dept)
                                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                            

                                            <div class="form-group">
                                                <label for="username" class="cols-sm-2 control-label">Make Active</label>
                                                <select class="form-control" name="active">
                                                    <option value="">Select</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>


                                            {{csrf_field()}}

                                </div>
                            <!-- end of modal body -->

                            <!-- footer -->
                        <div class="modal-footer ">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit</button>
                        </div>

                    </form>
                </div>
                    <!-- /.modal-content --> 
            </div>
            
        </div>
                     
            <!--- modal update -->
        <div class="modal fade user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">               


                    <form class="form-vertical" method="post" id="editUser">

                                <div class="modal-header" style="background-color: #f1c40f; color: #fff;font-weight:bold">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h4 class="modal-title custom_align" id="Heading"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update User Details</h4>
                                </div>

                                <!-- beginning of modal body -->
                                <div class="modal-body" style="padding:5%">

                                        <div class="form-group">
                                            <label for="name" class="control-label">First Name</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" required  placeholder="Enter first Name" required/>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname" required  placeholder="Enter Last Name" required/>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label">User ID</label>
                                            <input type="text" class="form-control" name="email"  id="email" required  placeholder="Enter Username" required/>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label">Telephone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" required  placeholder="Enter  Telephone" required/>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="control-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" required  placeholder="Enter  Password" required/>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="cols-sm-2 control-label">User Department </label>
                                            <select class="form-control" name="department_id" id="deptid">
                                                <option value="">Select</option>
                                                @foreach($departments as $dept)
                                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <input type="hidden" name="id" id="id">

                                        <div class="form-group">
                                            <label for="username" class="cols-sm-2 control-label">Make Active</label>
                                            <select class="form-control" name="active" id="active">
                                                    <option value="">Select</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                            </select>
                                        </div>


                                        {{csrf_field()}}

                                </div>
                        <!-- end of modal body -->

                        <!-- footer -->
                        <div class="modal-footer ">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <button type="submit" class="btn btn-warning"><span class="fa fa-check"></span> Update</button>
                    </div>

                    </form>
                </div>
                <!-- /.modal-content --> 
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>

    $("#createUser").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type:'GET',
            url: "{{route('create_user')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('#user').modal('hide'); 
                setInterval(function(){ location.reload() }, 5000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
    });
 

    $("#editUser").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type:'GET',
            url: "{{route('update_user')}}",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('.user').modal('hide'); 
               setInterval(function(){ location.reload() }, 5000);
            },error:function(err){
               bootbox.alert(err.responseText);
            }
        });
     
    });
        

    function user(e){
        $('.user').on('show.bs.modal',function(e){
            $('#active').val($(e.relatedTarget).data('active'));
            $('#email').val($(e.relatedTarget).data('email'));
            $('#firstname').val($(e.relatedTarget).data('firstname'));
            $('#lastname').val($(e.relatedTarget).data('lastname'));
            $('#phone').val($(e.relatedTarget).data('phone'));
            $('#password').val($(e.relatedTarget).data('password'));
            $('#roleid').val($(e.relatedTarget).data('roleid'));
            $('#deptid').val($(e.relatedTarget).data('deptid'));
            $('#id').val($(e.relatedTarget).data('id'));
        });
    }

    </script>
@stop