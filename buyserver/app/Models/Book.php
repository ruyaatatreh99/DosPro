<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


final class Book extends Model
{
    protected $table='books';
    protected $fillable = [ 'all_of_the_necessary_table_columns' ];
}
