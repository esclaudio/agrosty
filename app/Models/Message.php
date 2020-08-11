<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Captcha;

class Message extends Model
{
    const CREATED_AT = 'date';
    const UPDATED_AT = 'date';

    protected $table = 'messages';

    protected $fillable = [
        'body',
        'subjectId',
        'fromName',
        'fromEmail',
        'date',
        'spamScore',
    ];

    protected $dates = [
        'date',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectId');
    }

    public function getIsSpamAttribute(): bool
    {
        return $this->spamScore >= 2.5;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Message $message) {
            $message->spamScore = (new Captcha($message->body, [
                'viagra' => 5,
                'oferta' => 4,
                'ofertas' => 4,
                'buy' => 5,
                'contactenos' => 3,
                'tarifas' => 2,
                'stock' => 1,
            ]))->score();
        });
    }
}
