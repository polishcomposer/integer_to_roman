<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Converter;

class Controller
{
    public function convertInt(Request $request)
    {
        return response()->json(['result' => Converter::integerToRoman(intval($request->input('int-to-roman')))]);
    }

    public function convertRoman(Request $request)
    {
        return response()->json(['result' => Converter::romanToInteger($request->input('roman-to-int'))]);
    }
}
