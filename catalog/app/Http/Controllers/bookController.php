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
           if (Cache::has($id)) {//check if item exisy in cache
        $value = Cache::get($id);// get item from cache
        return response()->json($value);
}
        else{
            $expiresAt = 10;//the expiration time of the cached item
              $b= book::find($id);
           $q= $b['quntity'];
        $name= $b['name'];
           $cost= $b['cost'];
             Cache::put($id, $name,$cost,$q, $expiresAt);//insert value in cache
            return response()->json($b);
        }
        
    }

    public function searchbook($name)
    {     
  if (Cache::has($name)) {//check if item exisy in cache
        $value = Cache::get($name);// get item from cache
        return response()->json($value);
}
        else{
            $expiresAt = 10;//the expiration time of the cached item
           $b= book::find($name);
           $q= $b['quntity'];
               $id= $b['id'];
            $cost= $b['cost'];
            Cache::put($id, $name,$cost,$q, $expiresAt);// store items in the cache
            return response()->json($b);
        }
    }

   public function create(Request $request)
    {
        $books = book::create($request->all());

        return response()->json($books, 201);
    }

 public function update($id, Request $request)
    {
 
      $books = book::findOrFail($id);
        $books->update($request->all());

        return response()->json($books, 200);

  
    }

    public function delete($id)
    {
        $value = Cache::forget($id);//remove items from the cache
        book::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}

