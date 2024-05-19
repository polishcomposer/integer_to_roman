<?php

namespace Tests\Unit;

use App\Services\Converter;
use PHPUnit\Framework\TestCase;


class ConverterTest extends TestCase
{
    /**
     * @test
     */
    function it_cannot_cannot_convert_to_a_roman_numeral_for_less_than_1() {
        $this->assertFalse(Converter::integerToRoman(0));
    }

    /**
     * @test
     */
    function it_cannot_convert_to_a_roman_numeral_for_more_than_3999() {
        $this->assertFalse(Converter::integerToRoman(4000));
    }

    /**
     * @test
     * @dataProvider checks
     */
    function it_converts_to_the_roman_numeral($number, $numeral) {
        $this->assertEquals($numeral, Converter::integerToRoman($number));
    }

    public static function checks() {
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
            [3999, 'MMMCMXCIX']
        ];
    }
}
