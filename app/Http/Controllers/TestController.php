<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
//        $response = app()->make('response');
//        $response = app('response');
//        $response = $response();
//        $response = Response::make();
//        $ip = $request->ip();
//        return response('test', 200, [
//            'foo' => 'bar',
//        ]);

        return ['foo' => 'bar'];
    }

    public function __invoke(Request $request)
    {
        return 'Test';
    }
}
