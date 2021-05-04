<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    
    protected $fillable = ['eventname','category','organizer','address','contact','date','time'];
    protected $guarded=['role_id'];
}
