<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
   
     protected $fillable = [
        'submitter',  
        'subject',
        'department_id',      
        'client_id', 
        'status', 
        'user_id',
        'priority' ,
        'description'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

 

}