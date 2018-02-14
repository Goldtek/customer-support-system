<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Client;
use App\Department;
use App\Ticket;

use Carbon\Carbon;
use DB;


class UserController extends Controller
	{
   
    
        public function dashboard(){
            $depts = Department::orderBy('name','ASC')->get();
            $tickets = Ticket::get();
            $clients = client::orderBy('firstname','ASC')->get();
            $staffs = User::orderBy('firstname','ASC')->get();
            return view('users.dashboard',['clients'=>$clients,'staffs'=>$staffs,'departments'=>$depts,'tickets'=>$tickets]);
        }	
		
        //load users fro user table 
        public function viewUsers(){
            $user  = User::orderBy('id','ASC')->get();
            $depts =  Department::orderBy('name','ASC')->get();
            return view('users.view_users',['users'=>$user,'departments'=>$depts]);
        }
	
        //view clients  
        public function viewClients(){
            $clients  = Client::orderBy('id','ASC')->get();
            
            return view('users.clients',['clients'=>$clients]);
        }

        public function viewUserDept(){
            $dept = Department::orderBy('name','ASC')->get();
            return view('users.department',['department'=>$dept]); 
        }


        public function postUserDept(Request $request){
            if($request->ajax()){
                $this->validate($request,[
                    'deptname'=>'required',
                    'active' => 'required',
                ]);

                $dept = new Department();
                $dept->created = date("Y-m-d") ;
                $dept->name=$request['deptname'];
                $dept->active=$request['active'];
                $dept->save();

                return response('New Department Successfully Created');
            }
        }

        public function createUser(Request $request){
            if($request->ajax()){
                    $this->validate($request,[
                        'email'=>'required', 
                        'active'=>'required', 
                        'firstname'=>'required|alpha',
                        'lastname'=>'required|alpha', 
                        'phone'=>'required', 
                        'dept_id'=>'required', 

                    ]); 

                $user = new User();
                $user->email=$request['email'];
                $user->active=$request['active'];
                $user->firstname=$request['firstname'];
                $user->lastname=$request['lastname'];
                $user->phone=$request['phone'];
                $user->password=$request['password'];
                $user->department_id=$request['dept_id'];
                $user->save();
                
                return response('New Staff Was Successfully Created');
            }
	    }
              
        public function createClient(Request $request){
            if($request->ajax()){
                $this->validate($request,[
                    'email'=>'required|email', 
                    'firstname'=>'required|alpha',
                    'lastname'=>'required|alpha', 
                    'phone'=>'required', 
                    ]); 

                $client = new Client();
                $client->email=$request['email'];
                $client->firstname=$request['firstname'];
                $client->lastname=$request['lastname'];
                $client->phone=$request['phone'];
                $client->company=$request->company;
                $client->creator =  Auth::user()->id;
                $client->created =  Carbon::now();
                $client->save();
                
                return response('Client Was Successfully Created');
        
            }
        }

        public function createTicket(Request $request){
            if($request->ajax()){
                $this->validate($request,[
                    'department_id'=>'required',
                    'subject' => 'required',
                    'flag' => 'required',
                    'priority' => 'required',
                    'description' => 'required',
                    'client_id' => 'required',
                ]);

                $ticket = new Ticket();
                $ticket->subject=$request->subject;
                $ticket->department_id=$request->department_id;
                $ticket->status=$request->status;
                $ticket->submitter=Auth::user()->id;
                $ticket->user_id=$request->flag;
                $ticket->client_id=$request->client_id;
                $ticket->priority=$request->priority;
                $ticket->status =1;
                $ticket->description=$request->description;
                $ticket->save();

                return response('New Ticket Has Been Successfully Created');
            }
        }
        
      
		public function updateUser(Request $request){
            if($request->ajax()){
            $this->validate($request,[
                'id'=>'required',
                ]);
		  
            User::find($request['id'])->update($request->all());
            
			return response('User Details Successfully Updated');
            }
	    }
		
		public function updateClient(Request $request){
            if($request->ajax()){
                $this->validate($request,[
                'id'=>'required',
                ]);
		  
                Client::find($request['id'])->update($request->all());

                return response('Client Details Successfully Updated');
            }
    
        }
       
        public function updateDept(Request $request){
            if($request->ajax()){
                $this->validate($request,[
                        'id'=>'required',
                    ]);

                Department::find($request['id'])->update($request->all());
                return response('Department Update Successful');
            }
        }


		public function updateTicket(Request $request){
            if($request->ajax()){
            $this->validate($request,[
                'id'=>'required',
                ]);
		  
            Ticket::find($request['id'])->update($request->all());
            
			return response('Ticket Has Been Successfully Updated');
            }
	   }
		
        
        /* to be revisited */
        public function getUserDetails(Request $request){
            if($request->ajax()){
                $id = $request->id;
                $name = Reservation::where('id',$id)->where('status',1)->first()->name;
                return response($name);
            }
        }

        public function viewTicket($id){
         
            $users = User::get();
            $ticket = Ticket::where('id',$id)->first();
            $clients = Client::get();
            $depts = Department::get();
            $staffs = User::get();
                                
            return view('users.ticket',['ticket'=>$ticket,'users'=>$users,'clients'=>$clients,'departments'=>$depts,'staffs'=>$staffs]);
        }

        public function deleteticket(Request $request){
            if($request->ajax()){
                $id = $request->id;
                DB::table('tickets')->where('id', '=', $id)->delete();
                return response('Ticket #'.$id.' has been successfully deleted');
            }
        }
		
    }
