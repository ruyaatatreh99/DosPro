<?php

namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Cache;
use Laravel\RoundRobin\RoundRobin;
//php -S localhost:8000 -t public

class bookController extends Controller
{

    public function lookupbook($id)
    {
        $time=number_format((float)microtime(true) - LUMEN_START, 2); //excute run time
           if (Cache::has($id)) {//check if item exisy in cache
        $value = Cache::get($id);// get item from cache

     return response()->json($value.' '.'time='.$time.' '.'ms');
             
}
        else{
            $expiresAt = 10;//the expiration time of the cached item
              $b= book::find($id);
           $q= $b['quntity'];
        $name= $b['name'];
           $cost= $b['cost'];
             Cache::put($id, $name,$cost,$q, $expiresAt);//insert value in cache
            return response()->json($b.' '.'time='. $time.' '.'ms');
        }
        
    }

    public function searchbook($name)
    {   
        $time=number_format((float)microtime(true) - LUMEN_START, 2); //excute run time
  if (Cache::has($name)) {//check if item exisy in cache
        $value = Cache::get(2);// get item from cache
       return response()->json($value.' '.'time='.$time.' '.'ms');
}
        else{
            $expiresAt = 10;//the expiration time of the cached item
           $b= book::find(2);
           $q= $b['quntity'];
               $id= $b['id'];
            $cost= $b['cost'];
            Cache::put($id, $name,$cost,$q, $expiresAt);// store items in the cache
            return response()->json($b.' '.'time='. $time.' '.'ms');
            
        }
    }

   public function create(Request $request)
    {
       $time=number_format((float)microtime(true) - LUMEN_START, 2); //excute run time
        $books = book::create($request->all());
    return response()->json($books.' '.'time='.$time.' '.'ms');
    }

 public function update($id, Request $request)
    {
     $time=number_format((float)microtime(true) - LUMEN_START, 2); //excute run time
 
        $books = book::findOrFail($id);
        $books->update($request->all());
        return response()->json($books.' '.'time='.$time.' '.'ms');

  
    }

    public function delete($id)
    {
        $time=number_format((float)microtime(true) - LUMEN_START, 2); //excute run time
        $value = Cache::forget($id);//remove items from the cache
        book::findOrFail($id)->delete();
        return response('Deleted Successfully'.' '.'time='.$time.' '.'ms');

    }
}

