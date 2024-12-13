<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackVideo extends Model
{
    use HasFactory;

    protected $table = 'business_feedback';

    protected $fillable = [
        'business_unit_id',
        'feedback_video',
        'date',
        'time',
        'comments',
        'rating',
    ];

    // FeedbackVideo Model
public function businessUnit()
{
    return $this->belongsTo(BusinessUnit::class, 'business_unit_id', 'business_unit_id');
}


}
