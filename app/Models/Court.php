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

    public function court_category()
    {
        return $this->hasOne(CourtCategory::class, 'id', 'court_category_id');
    }

    public function city_id()
    {
        return $this->hasOne(ProjectCity::class, 'id', 'city_id');
    }

    public function state_id()
    {
        return $this->hasOne(ProjectState::class, 'id', 'state_id');
    }
}
