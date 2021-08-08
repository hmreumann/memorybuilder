<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['path','exam_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

}
