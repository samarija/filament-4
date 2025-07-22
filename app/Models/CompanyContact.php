<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyContact extends Model
{
    protected $fillable = ['company_id', 'name'];

    public function contact() : BelongsTo {
        return $this->belongsTo(Company::class);
    }
}
