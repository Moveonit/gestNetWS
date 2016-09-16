<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Debitore;

class SearchController extends Controller
{
    public function Debitore(Request $request)
    {
        $array = $request->all();
        $first = true;

        while ($value = current($array)) {
            if($first)
            {
                $first = false;
                $query = Debitore::where(key($array), trim(strstr($value, '|',true)), trim(substr(strstr($value, '|'),1)));
            }
            else
            {

                $query::where(key($array), trim(strstr($value, '|',true)), trim(substr(strstr($value, '|'),1)));
            }
            next($array);
        }
        return $query->get();




        //return Debitore::where('votes', '=', 100)->get();
    }
}
