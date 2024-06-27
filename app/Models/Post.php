<?php

namespace App\Models;

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
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

    public static function cachedAlphabetTitles()
    {
        $InstanceCache = CacheManager::getInstance('files');
        $CachedString = $InstanceCache->getItem("alphabet_titles");

        if (!$CachedString->isHit()) {
            $CachedString->set(self::alphabetTitles())->expiresAfter(60*10); // 10min
            $InstanceCache->save($CachedString);
            return $CachedString->get();
        } else {
            return $CachedString->get();
        }
    }

    private static function alphabetTitles()
    {
        $data = [];
        $alphabet = [
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й',
            'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
            'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ь', 'Ю', 'Я'
        ];
        $posts = self::select('title')->get();

        foreach($alphabet as $letter) {
            $data[$letter] = $posts ->filter(fn ($p) => str_starts_with(mb_strtolower($p->title), mb_strtolower($letter)))->toArray();
        }

        return $data;
    }
}
