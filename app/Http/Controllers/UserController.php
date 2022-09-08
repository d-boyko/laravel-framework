<?php

namespace App\Http\Controllers;

use App\Actions\ExportDatabaseTables;
use App\Actions\GetLoggedInUserInfoAction;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\Factory;
use Illuminate\View\View;
use Illuminate\Contracts\Foundation\Application;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public function getPrivatePage(GetLoggedInUserInfoAction $action)
    {
        if (Auth::check()) {
            return view('user.private-page', [
                'data' => $action->handle(),
            ]);
        }

        return view('register.index');
    }

    public function getUsersList(): Factory|View|Application
    {
        $response = DB::table('users')
            ->select('*')
            ->get();

        return view('user.index', compact('response'));
    }
}
