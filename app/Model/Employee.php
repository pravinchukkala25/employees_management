<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'date_of_joining', 'current_ctc', 'date_of_relieving'];
}
