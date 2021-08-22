<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Giver extends Authenticatable implements JWTSubject
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
         'birthdate',
         'caption',
        'bio',
        'address',
            'zip_code',
        'hourly_rate',
        'years_of_experience',
'rating',
        'care_type',
            'special_experience',
            'education_experience',
            'owns_car',
        'availability',
            'generally_available"',
        'background_document_path',
            'background_verified',
        'ccna_document_url',
            'ccna_verified',
        'cpr_document_url',
            'cpr_verified',
        'covid_document_url',
        'covid_verified',
        'vehicle_document_url',
            'vehicle_verified',
        'resume_document_url',
            'resume_verified',
            'password',
        'profile_photo_url',
            'date_joined'

    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    } 
}