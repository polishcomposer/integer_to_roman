<?php

namespace App\Services;

class Converter
{
    const NUMERALS = [
        '_C' => 100000,
        '_X_C' => 90000,
        '_L' => 50000,
        '_X_L' => 40000,
        '_X' => 10000,
        'M_X' => 9000,
        '_V' => 5000,
        'M_V' => 4000,
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    public static function integerToRoman($number): string|false
    {

        if (!is_int($number) || $number <= 0 || $number > 100000):
            return false;
        endif;

        $result = '';

        foreach (self::NUMERALS as $numeral => $arabic):
            for (; $number >= $arabic; $number -= $arabic):
                $result .= $numeral;
            endfor;
        endforeach;

        return $result;
    }

    public static function romanToInteger($string): int|false
    {

        if (!is_string($string) || empty($string) || strlen($string) > 20):
            return false;
        endif;

        $result = 0;
        $values = [];
        while (!empty($string)):
            $length = 4;
            while ($length >= 1):
                $key = substr($string, 0, $length);
                if (array_key_exists($key, self::NUMERALS)):
                    $value = self::NUMERALS[$key];
                    if (!empty($values)):
                        $res = array_search(true, array_map(function ($v) use ($value) {
                            return $v < $value;
                        }, $values));
                        if ($res !== false):
                            return false;
                        endif;
                    endif;
                    $result += $value;
                    array_push($values, $value);
                    $string = substr($string, $length);
                    break;
                endif;
                if ($length === 1):
                    return false;
                endif;
                $length--;
            endwhile;
        endwhile;

        if ($result === 0):
            return false;
        endif;

        return $result;
    }
}
