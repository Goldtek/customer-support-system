@include('partials.header')

      
        <!-- BEGIN LOGIN -->
        <div class="container">
            <!-- BEGIN LOGIN FORM -->
            <div  style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info">
                    <div class="panel-heading" style="background-color:#0e1a35">
                       <center> <h4 style="color:#fff;">Sign In</h2></center>  
                    </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div class="col-md-12 ">   
                        <form  class="form-horizontal" role="form" method="post" action="{{route('login')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input id="login-username" type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="User ID" required>   
                                    @if($errors->has('user_id'))  
                                        <span class="error"><strong>{{$errors->first('user_id')}}</strong></span>
                                    @endif               
                                </div>
                                
                                <div class="form-group">
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Password" required>
                                    @if($errors->has('password'))  
                                            <span class="error"><strong>{{$errors->first('password')}}</strong></span>
                                    @endif 
                                </div>
                             
                                <div class="input-group col-md-offset-1 col-sm-offset-1 col-xs-offset-2">
                                    <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember"> Remember me
                                        </label>
                                    </div>
                                </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <button type="submit" id="btn-login" href="#" class="btn btn-primary">Login  </button>
                                        <a href="#">Forgot password?</a>
                                    </div>
                                </div>

                                    @if(Session::has('info'))
                                        <div class="alert alert-danger alert-dismissible" role="alert" onload="run()">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            {{Session::get('info')}}
                                        </div>
                                    @endif           
                        </form>     
                    </div>


                    </div>                     
                </div>  
            </div>
       
        </div>
        <div class="col-md-offset-5 col-xs-offset-4"> <?php echo date("Y"); ?> © Customer Support System. </div>
      @include('partials.footer')
        
    