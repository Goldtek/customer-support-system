<?php $__env->startSection('content'); ?>
  <h1 class="page-title"> Admin Dashboard  </h1>
                    <div class="page-bar crub">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>
                       
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row " >
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                            <div class="dashboard-stat2 crub text-center" >
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="50"><?php echo e(DB::table('tickets')->where('status',1)->count()); ?></span>
                                            
                                        </h3>
                                        <small >Tickets Pending</small>
                                    </div>
                                    
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat2 crub text-center">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-red-haze">
                                            <span data-counter="counterup" data-value="30"><?php echo e(DB::table('tickets')->where('status',3)->count()); ?></span>
                                        </h3>
                                        <small>Tickets Close</small>
                                    </div>
                                    
                                </div>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                           
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                      
                       
                    </div>


    <div class="user-dashboard" style=" min-height:500px;">
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter" >
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6" style="margin:2% 0">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn btn-primary" data-tooltip="true" data-placement="top" data-toggle="modal" data-target="#add_ticket" title="Create New Position"> Add New Ticket
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                           <div class="col-md-5">
                                                <?php if(Session::has('info')): ?>
                                                    <div class="alert alert-success alert-dismissible" role="alert" >
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <?php echo e(Session::get('info')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                       
									   </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                 <th>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                
                                                  <td>Department</td>
                                                  <td>Subject</td>
                                                  <td> Assigned</td>
                                                  <td> Priority</td>
                                                 <td> Status</td>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               
                                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr class="odd gradeX">
                                               <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td> 
                                                
                                                <td> <?php echo e($ticket->department->name); ?> </td>    
                                                <td> <?php echo e($ticket->subject); ?></td>
                                                <td> <?php echo e($ticket->user->firstname); ?>  <?php echo e($ticket->user->lastname); ?></td>
                                                
                                                <td>
                                                
                                                    <?php if($ticket->priority==1): ?>
                                                    <span class="label label-md label-info"> High </span>
                                                      <?php elseif($ticket->priority==2): ?> 
                                                     <span class="label label-md label-success"> Medium </span>
                                                    <?php elseif($ticket->priority==3): ?>
                                                     <span class="label label-md label-warning"> Low </span>
                                                    <?php endif; ?>
                                                   
                                                </td>
                                                
                                                <td>
                                                    <?php if($ticket->status==1): ?>
                                                    <span class="label label-md label-info"> Pending </span>
                                                      <?php elseif($ticket->status==2): ?> 
                                                     <span class="label label-md label-success"> In Progress </span>
                                                    <?php elseif($ticket->status==3): ?>
                                                     <span class="label label-md label-danger"> Closed </span>
                                                    <?php endif; ?>
                                                       
                                                </td>
                                                <!-- command buttons -->
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="<?php echo e(route('edit_ticket',['id'=>$ticket->id])); ?>" data-tooltip="true" data-placement="top" title="Edit Ticket">
                                                                    <i class="fa fa-eye"></i> View Ticket </a>
                                                            </li>  
                                                            <li>
                                                                <a href="javasript:;" data-tooltip="true" data-placement="top" ticket-id="<?php echo e($ticket->id); ?>" class="del"  >
                                                                    <i class="fa fa-trash"></i> Delete Ticket </a>
                                                            </li>  
                                                           
                                                          
                                                        </ul>
                                                    </div>
                                                </td>
                                                <!-- end of command button -->
                                                
                                            </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                                               
                                           
									    </tbody>
                                    </table>
                                </div>
                           
                        </div>
                        
                    </div>
    </div>
    

    <!-- Modal create -->
    <div id="add_ticket" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add New Ticket</h4>
                </div>
                <form id="createForm" method="post" action="" >
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Subject</label> 
                            <input type="text" placeholder=" Subject" class="form-control" name="subject" required>
                        </div> 
                        <div class="form-group">  
                            <label class="control-label">client</label>    
                            <select name="client_id" class="form-control" required>
                                <option value="">Select Staff</option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($client->id); ?>"> <?php echo e($client->firstname); ?> <?php echo e($client->lastname); ?> - <?php echo e($client->company); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">Select Department</option>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($dept->id); ?>"> <?php echo e($dept->name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">  
                            <label class="control-label">Flag</label>    
                            <select name="flag" class="form-control" required>
                                <option value="">Select Staff</option>
                                <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($staff->id); ?>"> <?php echo e($staff->firstname); ?> <?php echo e($staff->lastname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">  
                            <label class="control-label">Priority</label>    
                            <select name="priority" class="form-control" required>
                                <option value="">Select</option>
                                <option value="1">High</option>
                                <option value="2">Medium</option>
                                <option value="3">Low</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label class="control-label">Message</label> 
                            <textarea placeholder="Please Type Message Here..." name="description" class="form-control resize" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
                    </div>
                </form>
            </div>

        </div>
    </div>

   

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $("#createForm").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
            $.ajax({
                type:'GET',
                url: "<?php echo e(route('createTicket')); ?>",
                data: formData,
                success:function(data){
                    bootbox.alert(data);
                    setInterval(function(){ location.reload() }, 5000);
                },error:function(err){
                    bootbox.alert(err.responseText);
                }
            });
     
        });

        $('.del').click(function(){
            var id = $(this).attr('ticket-id');
             $.ajax({
                type:'GET',
                url: "<?php echo e(route('deleteTicket')); ?>",
                data: {id:id},
                success:function(data){
                    bootbox.alert(data); 
                    setInterval(function(){ location.reload() }, 5000);
                },error:function(err){
                    bootbox.alert(err.responseText);
                }
            });

        });
        

    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <Style type="text/css">
        .crub{
            border:#b6babf dashed 2px; padding:1%; 
        }

        .resize{
            resize:vertical;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>