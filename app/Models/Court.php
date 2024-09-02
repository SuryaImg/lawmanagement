<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;

    /**
     * Write Your Code..
     *
     * @return string
    */

    protected $fillable = [
        'court_category_id',
        'location',
        'court_name',
        'description',
        'country_id',
        'state_id',
        'city_id',
    ];
}
