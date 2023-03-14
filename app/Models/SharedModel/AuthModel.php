<?php

namespace App\Models\SharedModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
/**Auth Model mean is for All Authenticable Authorization Model Mean that model can be use for Auth  */
class AuthModel extends Authenticatable
{
    /** HasApiTokens is libary from Sanctum we use sanctum for API
     * Notifable is mean can be got a notif from Laravel
    */
    use HasApiTokens, HasFactory, Notifiable;

     /** guarded mean there is which column can't updated or created it's mean automated from DB
      * @var array < int, string >
      */
     protected $guarded=['id','created_at','updated_at'];

     /** Hidden is for hidden for output
      * @var array <int,string>
     */
     protected $hidden=['remember_token','password'];

}
