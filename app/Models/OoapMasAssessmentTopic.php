<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OoapMasAssessmentTopic extends Model
{
    protected $table = 'ooap_mas_assessment_topics';

    protected $primaryKey = 'assessment_topics_id';

    protected $fillable = [

        'assessment_topics_name',
        'view_data',
        'insert_data',
        'update_data',
        'delete_data',
        'status',
        'in_active',
        'remember_token',
        'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at'
    ];
}
