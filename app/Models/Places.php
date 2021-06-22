<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','imageProfile','description','local','specialite','nbPlace','ouvert','email','password'
    ] ;
}
