<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseballGameController extends Controller
{
    /**
     * check auth or note
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * show baseball form
     */
    public function showBaseballForm()
    {
        return view('form.baseball_game');
    }
    /**
     * calculateGameScore
     */
    public function calculateGameScore(Request $request)
    {
        $opsStr = $request->input('ops');
        // dump($opsStr);
        $opsArr = explode(',', $opsStr); // Convert the input string into an array
        // dump($opsArr);
        $record = [];

        foreach ($opsArr as $op) {
            // dump($op);
            if (is_numeric($op)) {
                $record[] = (int)$op;
                // dump($record);
            } elseif ($op === "C") {
                array_pop($record);
            } elseif ($op === "D") {
                $record[] = 2 * end($record);
            } elseif ($op === "+") {
                $last = array_pop($record);
                $secondLast = end($record);
                $record[] = $last;
                $record[] = $last + $secondLast;
            }
        }
        // dump($record);
        $totalGameSum = array_sum($record);
        // dd($totalGameSum);
        return view('form.baseball_game')->with('totalSum', $totalGameSum);
    }
}
