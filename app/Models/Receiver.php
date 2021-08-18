<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receiver extends Model
{
    use HasFactory;


    


        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [

        'uuid',
        'api_token',
        'name',
        'email',
        'email_verified',
        'phone',
        'zip_code',
       'profile_photo_url',
        'date_joined',
        'password',


   ];



}
