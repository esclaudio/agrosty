<?php

namespace App\Helpers;

class Captcha
{
    protected $content;
    protected $dict;

    public function __construct(string $content, array $dict)
    {
        $this->content = $content;
        $this->dict = $dict;
    }

    public function score(): float
    {
        $words = array_map(function ($word) {
            return strtolower(trim($word));
        }, explode(' ', $this->content));

        $totalScore = 0;

        foreach ($this->dict as $key => $score) {
            foreach ($words as $word) {
                if ($word === strtolower($key)) {
                    $totalScore += $score;
                }
            }
        }

        return $totalScore/count($words);
    }
}
