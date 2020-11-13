<?php
//we have use App\book, which allowed us to require the book model that we created earlier.
namespace App\Http\Controllers;

use App\book;
use Illuminate\Http\Request;
class buyController extends Controller
{
    public function buybook($id) //buy functin 
    {
     $book= book::find($id); //find abook from database 
       $q=$book['quntity'];
        $name=$book['name'];
        $cost=$book['cost'];
        if ($q===0) return response()->json('no book in store');//checks if a book resource exists
        else{
            $q=$q-1; //update the quntity if it's any book in store
         $book->update(['quntity'=>$q]);//checks if a book resource exists and allows quntity to be updated

            return response()->json('bought book  '.$name);}// if a book exists return a msg + book name
    }

  
}
