<?php echo $__env->make('partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 
    <div class="page-container-bg-solid page-content">
         <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo" style="margin:7% 0; color:#fff; font-size:18px">
                    <b>Customer Support</b>
                </div>
                <div class="navi">
                    <ul>
                        <li class=""><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                        <li><a href="<?php echo e(route('view_user_dept')); ?>"><i class="fa fa-building" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Department</span></a></li>
                        <li><a href="<?php echo e(route('view_users')); ?>"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Staff Profiles</span></a></li>
                        <li><a href="<?php echo e(route('clients')); ?>"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Clients</span></a></li>
                         </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                  
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->lastname); ?>

                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                    <a href="<?php echo e(route('logout')); ?>" class="active" style="display:block"><i class="fa fa-sign-in" ></i> Logout</a>
                                                
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                   <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </div>
    </div>
 <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
   
            

