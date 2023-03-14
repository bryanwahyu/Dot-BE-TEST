<?php

namespace App\Models\User\Profile;

use App\Models\Disabilities\Disabilities;
use App\Models\SharedModel\BaseModel;
use App\Models\User\Profile\Builders\ProfileBuilder;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 *
 * @method static ProfileBuilders query()
 */
class Profile extends BaseModel
{
    

    public function user():BelongsTo
    {
        return $this->belongsTo(related:User::class,foreignKey:'user_id');
    }
    public function disabilities():BelongsTo
    {
        return $this->belongsTo(related:Disabilities::class,foreignKey:'disability_id');
    }
}
