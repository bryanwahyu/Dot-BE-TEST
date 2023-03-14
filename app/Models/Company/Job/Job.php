<?php

namespace App\Models\Company\Job;

use App\Models\Company\Company;
use App\Models\Disabilities\Disabilities;
use App\Models\SharedModel\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *  @property int
 *
 */
class Job extends BaseModel
{
    public function company():BelongsTo
    {
        return $this->belongsTo(related:Company::class,foreignKey:'company_id');
    }
    public function disabilities():BelongsTo
    {
        return $this->belongsTo(related:Disabilities::class,foreignKey:'disability_id');
    }
}
