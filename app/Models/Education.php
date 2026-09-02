<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = ['institution', 'degree', 'study_program', 'start_date', 'end_date', 'location', 'description', 'sort_order'];
}
