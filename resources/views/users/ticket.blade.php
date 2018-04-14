@extends('layouts.master')

@section('title')
Asset Manager
@endsection


@section('content')


             
			<div class="row" style="min-height:700px">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding:2%; ">
                        <h3 class="panel-title"><i class="icon-settings font-dark"></i> <strong>Manage Ticket</strong>  </h3>
                    </div>
                               	<!--- use this one -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption font-dark" style="height:50px;padding:1%;font-weight:bold">
                                        <i class=" fa fa-briefcase"></i>
                                        <span class="caption-subject bold uppercase" style="height:50px">Ticket ID:# {{sprintf('%08d', $ticket->id)}}  </span> 
                                      
                                    </div>
                                    
                                   
                                </div>
                                <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-offset-0 well"> The Ticket Management module allows you to efficiently manage your entire Ticket lifecycle.</div> 
                                                </div>
                                               
                                        
                                            </div>
                                        </div>
                                 
                                        <div class="container">
                                            <div class="panel-heading">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav active"><a href="#details" data-toggle="tab">Details</a></li>
                                                    <li class="nav"><a href="#notesTab" data-toggle="tab">Notes</a></li>
                                                    
                                                </ul>
                                            </div>

                                                                    <!-- Tab panes -->
                                            <div class="panel-body" style="border:1px solid #ccc;"> 
                                                    <div class="tab-content">
                                                        <!--details-->
                                                        <div class="tab-pane fade in active" id="details">
                                                            <div class="col-md-6 col-md-offset-3">            
                                                                <form class="form-vertical" id="UpdateTicket"> 
                                                                    <div class="form-group">
                                                                        <label class="control-label">Subject</label> 
                                                                        <input type="text" placeholder=" Subject" class="form-control" value="{{$ticket->subject}}" name="subject" required>
                                                                    </div> 
                                                                    <div class="form-group">  
                                                                        <label class="control-label">client</label>    
                                                                        <select name="client_id" class="form-control" required>
                                                                            <option value="">Select Staff</option>
                                                                            @foreach($clients as $client)
                                                                                <option value="{{$client->id}}" {{($ticket->client_id==$client->id)?'selected':''}}> {{$client->firstname}} {{$client->lastname}} - {{$client->company}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Department</label>
                                                                        <select name="department_id" class="form-control" required>
                                                                            <option value="">Select Department</option>
                                                                            @foreach($departments as $dept)
                                                                                <option value="{{$dept->id}}" {{($ticket->department_id==$dept->id)?'selected':''}}> {{$dept->name}} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">  
                                                                        <label class="control-label">Flag</label>    
                                                                        <select name="user_id" class="form-control" required>
                                                                            <option value="">Select Staff</option>
                                                                            @foreach($staffs as $staff)
                                                                                <option value="{{$staff->id}}" {{($ticket->user_id==$staff->id)?'selected':''}}> {{$staff->firstname}} {{$staff->lastname}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">  
                                                                        <label class="control-label">Priority</label>    
                                                                        <select name="priority" class="form-control" required>
                                                                            <option value="">Select</option>
                                                                            <option value="1" {{($ticket->priority==1)?'selected':''}}>High</option>
                                                                            <option value="2" {{($ticket->priority==2)?'selected':''}}>Medium</option>
                                                                            <option value="3" {{($ticket->priority==3)?'selected':''}}>Low</option>
                                                                        </select>
                                                                    </div>
                                                                        <div class="form-group">  
                                                                            <label class="control-label">Status</label>    
                                                                            <select name="status" class="form-control" required>
                                                                                <option value="">Select</option>
                                                                                <option value="1" {{($ticket->status==1)?'selected':''}}> Pendig</option>
                                                                                <option value="2" {{($ticket->status==2)?'selected':''}}> In Progress</option>
                                                                                <option value="3" {{($ticket->status==3)?'selected':''}}> Closed </option>
                                                                            </select>
                                                                        </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label">Message</label> 
                                                                        <textarea placeholder="Type Message Here..." name="description" class="form-control resize" required> {{$ticket->description}}</textarea>
                                                                    </div> 

                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Update Ticket</button>
                                                                    </div>
                                                                  <input type="hidden" name="id" value='{{$ticket->id}}' />     
                                                                </form>
                                                            </div>
                                                        </div>
                                                                
                                                       
                                                                        
                                                        <!-- notes -->
                                                        <div class="tab-pane fade" id="notesTab">
                                                            
                                                        </div>

                                                                  
                                                    </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                               
                               
                </div>
            </div>


                                                         <!--- modal view notes -->
    <div class="modal fade notes"  tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">               
                    <!-- beginning of modal body -->
                    <div class="modal-body" style="padding:5%">
                         <div class="form-group">
                            <label for="name" class="control-label">Notes</label>
                            <textarea name="notes" id="assign_notes" class="form-control" style="resize:vertical;" placeholder="Enter Notes" required ></textarea>
                        </div>
                    </div>
                   
             
            </div>
            <!-- /.modal-content --> 
        </div>
        
    </div>
            
    
             

    
@endsection

@section('script')
<script>
$(document).ready(function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
});

    function notes(e){
		$('.notes').on('show.bs.modal',function(e){
             $('#assign_notes').val($(e.relatedTarget).data('note'));
        });
    }

    

    $('#UpdateTicket').submit(function(e){
        e.preventDefault();
        var formData = jQuery(this).serialize();  
            $.ajax({
                    type:'GET',
                    url:"{{route('updateTicket')}}",
                    data: formData,
                    dataType:'html',
                    success:function(data){
                    bootbox.alert(data); 
                    setInterval(function(){ location.reload() }, 5000);
                },error:function(err){
                    console.log(err.responseText);
                }
            });
    });
    
</script>
    @stop