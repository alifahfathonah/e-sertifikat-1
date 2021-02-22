<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ApiController extends Controller
{
    
    public function datauser()
    {
        $user = DB::table('users')
                ->select('name', 'username', 'email')
                ->get();

        return response()->json([
            'datausers' => $user,
        ]);
    }

    public function databusiness()
    {
        $business = DB::table('business')
                ->get();

        return response()->json([
            'databusiness' => $business,
        ]);
    }

}
