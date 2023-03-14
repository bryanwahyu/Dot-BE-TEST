<?php

namespace App\Models\SharedModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/** Base Model is for every base model */
class BaseModel extends Model
{
    use HasFactory;
    /** guarded mean there is which column can't updated or created it's mean automated from DB */
    protected $guarded=['id','created_at','updated_at'];

}
