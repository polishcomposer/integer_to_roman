<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Converter;

class Controller
{
    public function convertInt(Request $request)
    {
        $integerValue = strip_tags($request->input('int-to-roman'));
        return response()->json(['result' => Converter::integerToRoman(intval($integerValue))]);
    }

    public function convertRoman(Request $request)
    {
        $romanNumerals = strip_tags($request->input('roman-to-int'));
        return response()->json(['result' => Converter::romanToInteger($romanNumerals)]);
    }
}
