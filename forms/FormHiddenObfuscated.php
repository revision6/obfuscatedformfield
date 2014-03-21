<?php
/**
 * Created by PhpStorm.
 * User: jb
 * Date: 19.03.14
 * Time: 10:57
 */

namespace revision6;


class FormHiddenObfuscated extends \FormHidden {

    public function generate()
    {
        $GLOBALS['TL_JAVASCRIPT']['obfuscatedformfield'] = 'system/modules/obfuscatedformfield/assets/obfuscatedformfield.js';

        $obfuscatedValue = $this->encrypt($this->varValue, 'ZMoPNjvTr9');
        $elementId = "obffrmfld";
        return sprintf('<input id="%s" type="hidden" name="%s" value="%s"%s',
            $elementId,
            $this->strName,
            specialchars($obfuscatedValue),
            $this->strTagEnding);
    }

    private function encrypt($value, $pw)
    {
        $a = 0;
        $myString = '';
        $textLen = strlen($value);
        $pwLen = strlen($pw);

        for ($i = 0; $i < $textLen; $i++)
        {
            $a = intval($this->charCodeAt($value, $i));

            $a = $a ^ ($this->charCodeAt($pw, $i % $pwLen));
            $a = $a . "";
            while (strlen($a) < 3)
                $a= '0' . $a;

            $myString .= $a;
        }
        return $myString;
    }

    private function charCodeAt($str, $num)
    {
        return utf8_ord($this->utf8_charAt($str, $num));
    }

    private function utf8_charAt($str, $num)
    {
        return mb_substr($str, $num, 1, 'UTF-8');
    }
}