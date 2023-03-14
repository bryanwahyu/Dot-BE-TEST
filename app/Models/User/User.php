<?php

namespace App\Models\User;

use App\Models\SharedModel\AuthModel;
use App\Models\User\Profile\Profile;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * @property int $id
 *
 * @method static UserBuilders query()
 */
class User extends AuthModel
{



    public function profile():HasOne
    {
        return $this->hasOne(related:Profile::class,foreignKey:'user_id');
    }
}
