<?php

namespace App\Models;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'user_id', 'phone'
    ];

    /**
     * Get all model fillables
     * @return array
     */
    public function getFillables()
    {
        return $this->fillable;
    }

    /**
     * Relationship belongs to company table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relationship belongs to user table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
