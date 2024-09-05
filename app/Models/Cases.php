<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Cases extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $table = 'cases';

    /**
     * Write Your Code..
     *
     * @return string
    */

    protected $fillable = [
        'type',
        'p_r_name',
        'p_r_advocate',
        'title',
        'case_category_id',
        'court_category_id',
        'court_id',
        'staff_id',
        'stage_id',
        'opp_lawyer',
        'case_no',
        'case_file_no',
        'acts',
        'case_charge',
        'receiving_date',
        'filling_date',
        'hearing_date',
        'judgement_date',
        'description'
    ];

    

    public function case_category()
    {
        return $this->hasOne(CaseCategory::class, 'id', 'case_category_id');
    }

    public function court_category()
    {
        return $this->hasOne(CaseCategory::class, 'id', 'court_category_id');
    }

    public function court()
    {
        return $this->hasOne(CaseCategory::class, 'id', 'court_id');
    }

    public function staff()
    {
        return $this->hasOne(CaseCategory::class, 'id', 'staff_id');
    }
}
