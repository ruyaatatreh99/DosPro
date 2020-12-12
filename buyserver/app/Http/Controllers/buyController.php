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
use Laravel\RoundRobin\RoundRobin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Migrations\Migration;
use App\Equivalance;
class buyController extends Controller
{

    public function buybook(Request $request,$id) //buy functin 
    {

     $time=number_format((float)microtime(true) - LUMEN_START, 2);//excute run time
    if (Cache::has($id)) {
        $value = Cache::get($id);// get item from cache
        $q= $value['quntity'];
        $name= $value['name'];
        $cost= $value['cost'];
        if ($q===0){ return response()->json(['no book in store' , 'time=' => $time.' '.'ms']);}//checks if a book resource exists
        else{
        Cache::decrement($q,1);// update integer items in the cach
        return response()->json(['bought book' => $name, 'time=' => $time.' '.'ms']);
        }
        
       }
        else{
            $v= book::find($id);
            $q= $v['quntity'];
            $name= $v['name'];
            $cost= $v['cost'];
            if ($q===0){return response()->json(['no book in store' , 'time=' => $time.' '.'ms']);}//checks if a book resource exists
            else{
            $q=$q-1;//checks if a book resource exists and allows quntity to be updated
            $v->update(['quntity'=>$q]);
             return response()->json(['bought book' => $name, 'time=' => $time.' '.'ms']);
               
            }
  
           }
            
              
            }
}

    
        
