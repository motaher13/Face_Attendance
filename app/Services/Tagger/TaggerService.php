<?php
/**
 * Created by PhpStorm.
 * User: rat
 * Date: 7/23/17
 * Time: 10:32 PM
 */

namespace App\Services\Tagger;


use App\BaseSettings\Settings;

class TaggerService
{
    public function lookForTags($haystack)
    {
        if(preg_match('(initiative)', strtolower($haystack)) === 1) {
            return Settings::$Initiative_tag;
        }elseif (preg_match('(volksbegehren)', strtolower($haystack)) === 1){
            return Settings::$Initiative_tag;
        }elseif (preg_match('(volksinitiative)', strtolower($haystack)) === 1){
            return Settings::$Initiative_tag;
        }

        elseif (preg_match('(gesetz)', strtolower($haystack)) === 1){
            return Settings::$Bundesgesetz_tag;
        }elseif (preg_match('(bundesbeschluss)', strtolower($haystack)) === 1){
            return Settings::$Bundesgesetz_tag;
        }elseif (preg_match('(bundesgesetz)', strtolower($haystack)) === 1){
            return Settings::$Bundesgesetz_tag;
        }

        elseif (preg_match('(gegenentwurf)', strtolower($haystack)) === 1){
            return Settings::$Gegenentwurf_tag;
        }
        return null;
    }
}