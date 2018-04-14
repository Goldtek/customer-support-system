<?php $__env->startSection('title'); ?>
User Administration
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


             
        <div class="row" style="min-height:700px;">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="icon-settings font-dark"></i> <strong>Client Administration</strong>  </h3>
                    </div>
                               
                    <div class="row">
                        <div class="col-md-12">
                     
                        <div class="portlet-body panel">
                            <div class="table-toolbar panel-heading" style="background:#fff">
                                <div class="row" >
                                     <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn btn-primary" data-target="#user" data-tooltip="true" data-toggle="modal" data-placement="top" title="Create new Client"> <i class="fa fa-plus"></i> Add Client
                                                    
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <?php if(Session::has('info')): ?>
                                            <div class="alert alert-success alert-dismissible" role="alert" onload="run()">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                        <?php echo e(Session::get('info')); ?>

                                            </div>
                                        <?php endif; ?>
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

                                                    
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Name Of Company</td>
                                                    <td>Email</td>
                                                     <td>Phone</td>
                                                    
                                                    <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                <tr class="odd gradeX">
                                                   <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="checkboxes" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </td> 

                                                    <td> <?php echo e($client->firstname); ?> </td>
                                                    <td> <?php echo e($client->lastname); ?> </td>
                                                    <td> <?php echo e($client->company); ?> </td>
                                                    <td> <?php echo e($client->email); ?> </td>
                                                    <td> <?php echo e($client->phone); ?></td>

                                                    
                                                  <!-- command buttons -->
                                                    <td>
                                                        <div class="btn-group">
                                                            <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-left" role="menu">
                                                                <li>
                                                                     
                                                                    <a href="javascript:;" onclick="user()" data-tooltip="true" data-placement="top" data-target=".user" data-email="<?php echo e($client->email); ?>"  data-company="<?php echo e($client->company); ?>"  data-firstname="<?php echo e($client->firstname); ?>" data-lastname="<?php echo e($client->lastname); ?>" data-phone="<?php echo e($client->phone); ?>" data-id="<?php echo e($client->id); ?>"  data-toggle="modal" title="Edit Client">
                                                                        <i class="fa fa-pencil"></i> Edit Client 
                                                                    </a>
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
                            <!-- END EXAMPLE TABLE PORTLET-->
                        
                    </div>             
            </div>
        </div>
                            


                                              <!--- modal create -->
    <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">               	        
                <form class="form-vertical" method="post" action="<?php echo e(route('create_clients')); ?>" id="createForm">

            <div class="modal-header " style="background-color: #32c5d2; color: #fff;font-weight:bold">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title custom_align" id="Heading"> <i class="fa fa-info-circle" aria-hidden="true"></i> Create New Client</h4>
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
                                    <label for="name" class="control-label">Company</label>
                                    <input type="text" class="form-control" name="company" required  placeholder="Enter Name Of Company" />
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" required  placeholder="Enter Email Address" required/>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="control-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" required  placeholder="Enter  Telephone" required/>
                                </div>

                  

                                <?php echo e(csrf_field()); ?>


              </div>
                <!-- end of modal body -->

                <!-- footer -->
            <div class="modal-footer ">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                <?php endif; ?>

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


                <form class="form-vertical" method="post"  id="editClient">

                        <div class="modal-header" style="background-color: #f1c40f; color: #fff;font-weight:bold">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title custom_align" id="Heading"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update Client Details</h4>
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
                                        <label for="name" class="control-label">Company</label>
                                        <input type="text" class="form-control" name="company" id="company" required  placeholder="Enter Name Of Company" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="control-label">Email Address</label>
                                        <input type="email" class="form-control" name="email"  id="email" required  placeholder="Enter Email Address" required/>
                                    </div>
                                    <input type="hidden" name="id" id="id"/>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Telephone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" required  placeholder="Enter  Telephone" required/>
                                    </div>

                                   
                                    <?php echo e(csrf_field()); ?>


                            </div>
                    <!-- end of modal body -->

                    <!-- footer -->
                    <div class="modal-footer ">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <p><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-warning"><span class="fa fa-check"></span> Update</button>
                  </div>

            </form>
            </div>
            <!-- /.modal-content --> 
        </div>

    </div>
                     
               
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>

        $("#createForm").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type:'GET',
            url: "<?php echo e(route('create_clients')); ?>",
            data: formData,
            success:function(data){
                $('#user').modal('hide');
                bootbox.alert(data);
                setInterval(function(){ location.reload() }, 6000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
    });


       $("#editClient").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
        $.ajax({
            type:'GET',
            url: "<?php echo e(route('updateClient')); ?>",
            data: formData,
            success:function(data){ 
                $('.user').modal('hide');
                bootbox.alert(data);
                setInterval(function(){ location.reload() }, 6000);
            },error:function(err){
               bootbox.alert(err.responseText);
            }
        });
     
    });
        
function user(e){
    $('.user').on('show.bs.modal',function(e){
        $('#email').val($(e.relatedTarget).data('email'));
        $('#firstname').val($(e.relatedTarget).data('firstname'));
        $('#lastname').val($(e.relatedTarget).data('lastname'));
        $('#company').val($(e.relatedTarget).data('company'));
        $('#phone').val($(e.relatedTarget).data('phone'));
        $('#id').val($(e.relatedTarget).data('id'));
    });
}

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>