<?php $__env->startSection('title'); ?>
System Settings
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


                  <div class="row" style="min-height:700px;">
                           <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title"><i class="icon-settings font-dark"></i> <strong>Staff Department</strong>  </h3>
                                                </div>
                               	<!--- use this one -->
                    <div class="row">
                        <div class="col-md-12">
                           
                            <div class="portlet light ">
                               
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6" style="margin:2% 0;">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn btn-primary" data-target="#dept" data-tooltip="true" data-toggle="modal" data-placement="top" title="Create New Department"> <i class="fa fa-plus"></i> Add New Department
                                                        
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
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                 <th>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                
                                                <td>Department Name</td>
                                                    <td>Active Status</td>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            
                                            <tr class="odd gradeX">
                                               <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td> 
                                                
                                                <td> <?php echo e($dept->name); ?> </td>
                                                
                                                <td>
                                                    <?php if($dept->active==1): ?>
                                                    <span class="label label-sm label-success"> Active </span>
                                                         <?php else: ?>
                                                     <span class="label label-sm label-warning"> Inactive </span>
                                                      <?php endif; ?> 
                                                </td>
                                              <!-- command buttons -->
                                                <td>
                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;" onclick="dept()" data-name="<?php echo e($dept->name); ?>" data-active="<?php echo e($dept->active); ?>" data-id="<?php echo e($dept->id); ?>" data-tooltip="true" data-toggle="modal" data-placement="top" title="Edit User Department" data-target=".dept">
                                                                    <i class="fa fa-pencil"></i> Edit User Department </a>
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
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                               
                               
                        </div>
                       </div>
                            
                         
					


                            <!--- modal create -->
<div class="modal fade" id="dept" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">               
         		
 	<form class="form-horizontal" method="post" action="" id="createDept">	
        <div class="modal-header" style="background-color: #32c5d2; color: #fff;font-weight:bold">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title custom_align" id="Heading">Create New User Department</h4>
      </div>
        
        <!-- beginning of modal body -->
          <div class="modal-body" style="padding:5%">	
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="deptname" id="deptname"  placeholder="Enter Department Name" required/>
								</div>
							</div>
						</div>

						
                        <input type="hidden" name="id">
						<div class="form-group">
							<label for="make-active" class="cols-sm-2 control-label">Make Active</label>
							<select class="form-control" name="active">
                                <option value="">select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
						</div>

						
                        <?php echo e(csrf_field()); ?>

					     
        	          
      </div>
        <!-- end of modal body -->
        
        <!-- footer -->
          <div class="modal-footer ">
              <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit</button>
      </div>

          		</form>
          </div>
    <!-- /.modal-content --> 
  </div>
      
    </div>
                 
            
                                   <!--- modal update -->
<div class="modal fade dept" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">               
         		
 	<form class="form-horizontal" method="post" id="editDept">	
    <div class="modal-header" style="background-color:#f1c40f; color:#fff;font-weight:bold">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title custom_align" id="Heading">Update User Department</h4>
    </div>
        
        <!-- beginning of modal body -->      
          <div class="modal-body" style="padding:5%">
        	
				    <div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Department Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-th-large fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter Department Name" required/>
								</div>
							</div>
				    </div>

						
                    <input type="hidden" name="id" id="id">
						<div class="form-group">
							<label for="make-active" class="cols-sm-2 control-label">Make Active</label>
									<select class="form-control" name="active" id="active">
                                    <option >select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                    </select>
						</div>

						
						
                        <?php echo e(csrf_field()); ?>

					     
        	          
      </div>
        <!-- end of modal body -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    <?php endif; ?>
        <!-- footer -->
            <div class="modal-footer ">
              <button type="submit" class="btn btn-warning"><span class="fa fa-check"></span> Update </button>
            </div>

    </form>
</div>
    <!-- /.modal-content --> 
  </div>
      
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>



    $("#createDept").submit(function(e){ 
        
        e.preventDefault();
        var formData = jQuery(this).serialize();
          $.ajax({
            type:'GET',
            url: "<?php echo e(route('saveStaffDept')); ?>",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('#dept').modal('hide');
                 bootbox.alert(data); 
                //setInterval(location.reload(), 60000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
    });

$("#editDept").submit(function(e){   
        e.preventDefault();
        var formData = jQuery(this).serialize();
          $.ajax({
            type:'GET',
            url: "<?php echo e(route('system_update_user_department')); ?>",
            data: formData,
            success:function(data){
                bootbox.alert(data);
                $('.dept').modal('hide'); 
                 bootbox.alert(data);
             // setInterval(location.reload(), 60000);
            },error:function(err){
                bootbox.alert(err.responseText);
            }
        });
     
});


    function dept(e){
    $('.dept').on('show.bs.modal',function(e){
        $('#name').val($(e.relatedTarget).data('name'));
        $('#active').val($(e.relatedTarget).data('active'));
        $('#id').val($(e.relatedTarget).data('id'));
            });
    }

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>