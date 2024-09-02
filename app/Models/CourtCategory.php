<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtCategory extends Model
{
    use HasFactory;

    /**
     * Write Your Code..
     *
     * @return string
    */

    protected $fillable = [
        'name',
        'description'
    ];
}
