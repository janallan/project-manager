<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product',
        'description',
        'target',
        'has_coding_language',
        'coding_language',
        'has_buildup',
        'buildup_file',
        'is_buildup_by_code_expert',
        'buildup_date',
        'has_design',
        'design_file',
        'is_design_by_code_expert',
        'design_date',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'has_coding_language' => 'boolean',
        'has_buildup' => 'boolean',
        'is_buildup_by_code_expert' => 'boolean',
        'buildup_date' => 'date',
        'has_design' => 'boolean',
        'is_design_by_code_expert' => 'boolean',
        'design_date' => 'date',
    ];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($project) {
            $project->user_id = Auth::user()->id;
        });
    }
}
