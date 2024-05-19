<?php

namespace Tests\Unit;

use App\Services\Converter;
use PHPUnit\Framework\TestCase;


class ConverterTest extends TestCase
{

    /**
     * @test
     */
    function cannot_convert_a_string()
    {
        $this->assertFalse(Converter::integerToRoman('XXDSere'));
    }

    /**
     * @test
     */
    function cannot_convert_to_a_roman_numeral_for_less_than_1()
    {
        $this->assertFalse(Converter::integerToRoman(0));
    }

    /**
     * @test
     */
    function cannot_convert_to_a_roman_numeral_for_more_than_100000()
    {
        $this->assertFalse(Converter::integerToRoman(100001));
    }

    /**
     * @test
     * @dataProvider checks
     */
    function converts_to_the_roman_numeral($number, $numeral)
    {
        $this->assertEquals($numeral, Converter::integerToRoman($number));
    }

    /**
     * @test
     */
    function cannot_convert_a_integer()
    {
        $this->assertFalse(Converter::romanToInteger(198391));
    }

    /**
     * @test
     */
    function cannot_convert_a_string_longer_than_20_characters()
    {
        $this->assertFalse(Converter::romanToInteger('123456789123456789123'));
    }


    /**
     * @test
     * @dataProvider checks
     */
    function converts_to_the_integers($number, $numeral)
    {
        $this->assertEquals($number, Converter::romanToInteger($numeral));
    }


    public static function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX'],
            [5940, '_VCMXL'],
            [6022, '_VMXXII'],
            [14043, '_XM_VXLIII'],
            [39345, '_X_X_XM_XCCCXLV'],
            [58495, '_L_VMMMCDXCV'],
            [60705, '_L_XDCCV'],
            [79509, '_L_X_XM_XDIX'],
            [95844, '_X_C_VDCCCXLIV'],
            [99999, '_X_CM_XCMXCIX'],
            [100000, '_C']
        ];
    }
}
