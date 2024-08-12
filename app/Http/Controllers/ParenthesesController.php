<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParenthesesController extends Controller
{
    /**
     * CHeck auth or not
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show form for input
     */
    public function showForm()
    {
        return view('form.valid_parent');
    }
    // 
    public function validParentheses(Request $request)
    {
        $inputStr = $request->input('parentheses');
        // dump($inputStr);
        $stack = [];
        $mapChar = [
            ')' => '(',
            '}' => '{',
            ']' => '['
        ];

        for ($i = 0; $i < strlen($inputStr); $i++) {
            $char = $inputStr[$i];
            // dump($i);
            if (in_array($char, array_keys($mapChar))) {
                $topElement = array_pop($stack) ?? '#';
                if ($mapChar[$char] !== $topElement) {
                    return redirect()->back()->with('result', 'invalid');
                }
            } else {
                $stack[] = $char;
            }
        }
        // dd($stack);
        return empty($stack) ? redirect()->back()->with('result', 'valid') : redirect()->back()->with('result', 'invalid');
    }
}
