<?php

namespace App\Models\Disabilities;

use App\Models\Company\Job\Job;
use App\Models\Disabilities\Builders\DisabilitiesBuilder;
use App\Models\SharedModel\BaseModel;
use App\Models\User\Profile\Profile;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 *
 * @method static DisabilitiesBuilders query()
 */
class Disabilities extends BaseModel
{

    public function profile():HasMany
    {
        return $this->hasMany(related:Profile::class,foreignKey:'disability_id');
    }
    public function job():HasMany
    {
        return $this->hasMany(related:Job::class,foreignKey:'disability_id');
    }
}
