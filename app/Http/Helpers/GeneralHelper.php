<?php
/**
 * Created by PhpStorm.
 * User: rsingh
 * Date: 07-10-2022
 * Time: 14:14
 */

namespace App\Http\Helpers;


class GeneralHelper
{
    public static function assoc2indexedMulti($arr) {

        // initialize destination indexed array
        $indArr = array();

        // loop through source
        foreach($arr as $val) {

            // if the element is array call the recursion
            if(is_array($val)) {

                $indArr[] = self::assoc2indexedMulti($val);

                // else add the value to destination array
            } else {

                $indArr[] = $val;
            }
        }

        return $indArr;
    }

    // Get SEO URL function here
    public static function seoUrl($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }
}
