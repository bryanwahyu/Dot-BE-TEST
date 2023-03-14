<?php

namespace App\Models\Company;

use App\Models\Company\Builders\CompanyBulider;
use App\Models\Company\Job\Job;
use App\Models\SharedModel\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int
 */
class Company extends BaseModel{

    public function job():HasMany
    {
        return $this->hasMany(related:Job::class,foreignKey:'company_id');
    }
}
