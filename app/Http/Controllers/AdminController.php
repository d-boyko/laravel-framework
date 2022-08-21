<?php

namespace App\Http\Controllers;

use App\Jobs\ExportCsvPostsTable;
use App\Jobs\ExportCsvUsersTable;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.menu');
    }

    public function exportUsersCsv()
    {
        ExportCsvUsersTable::dispatch();
        return redirect(route('admin.functions'));
    }

    public function exportPostsCsv()
    {
        ExportCsvPostsTable::dispatch();
        return redirect(route('admin.functions'));
    }

    public function listOfUsers()
    {
        $response = User::all();
        return view('user.index', compact('response'));
    }

    public function showUser($id)
    {
        $response = User::find($id);
        return view('user.show', compact('response'));
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function exportCsv()
    {
        ExportCsvUsersTable::dispatch();
        ExportCsvPostsTable::dispatch();

        return redirect(route('users.list'));
    }
}
