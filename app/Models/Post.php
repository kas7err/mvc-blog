<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{
    public $timestamps = true;
    public $fillable = ['title', 'description'];

    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 50]],
            'description' => [self::RULE_REQUIRED],
        ];
    }
}
