<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    public $timestamps = false;

    protected $fillable = [
        'desc',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'subjectId');
    }
}
