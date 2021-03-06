<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function sharedUsers()
    {
        return $this->belongsToMany(User::class)->withPivot('permissions')->withTimestamps();
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
