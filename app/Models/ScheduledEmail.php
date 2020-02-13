<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduledEmail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_name', 'from_email',
        'to_name', 'to_email',
        'message', 'date_time'
    ];

    /**
     * Get all model fillables
     * @return array
     */
    public function getFillables()
    {
        return $this->fillable;
    }
}
