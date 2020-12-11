<?php
//we have use App\book, which allowed us to require the book model that we created earlier.
namespace App\Http\Controllers;
//php -S localhost:8000 -t public


use App\book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Cache;
use Queue;
use Laravel\RoundRobin\RoundRobin;
class buyController extends Controller
{

    public function buybook(Request $request,$id) //buy functin 
    {
       // $this->dispatchFrom('App\Jobs\loadbalace', $request);//extract variables from the HTTP request
    if (Cache::has($id)) {
        $value = Cache::get($id);// get item from cache
        $q= $value['quntity'];
        $name= $value['name'];
        $cost= $value['cost'];
        if ($q===0){ return response()->json('no book in store');}//checks if a book resource exists
        else{
        Cache::decrement($q,1);// update integer items in the cach
        return response()->json('bought book  '.$name);
        }
        
       }
        else{
            $v= book::find($id);
            $q= $v['quntity'];
            $name= $v['name'];
            $cost= $v['cost'];
            if ($q===0){ return response()->json('no book in store');}//checks if a book resource exists
            else{
            $q=$q-1;//checks if a book resource exists and allows quntity to be updated
            $v->update(['quntity'=>$q]);
                return response()->json('bought book  '.$name);}
  
           }
            
              
            }
}

    
        
