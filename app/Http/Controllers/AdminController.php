<?php

namespace App\Http\Controllers;

use App\Actions\UpdateUserGroupAction;
use App\Jobs\ExportCsvPostsTable;
use App\Jobs\ExportCsvUsersTable;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $response = User::getCachedTable();
        return view('user.index')
            ->with(['response' => $response]);
    }

    public function showUser($id)
    {
        $response = User::find($id);
        return view('user.show')
            ->with('response', $response);
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

    /**
     * @return Application|Factory|View
     */
    public function updateUserView(): Application|Factory|View
    {
        return view('admin.update-user');
    }

    /**
     * @param Request $request
     * @param UpdateUserGroupAction $action
     * @return Application|RedirectResponse|Redirector
     */
    public function updateUser(Request $request, UpdateUserGroupAction $action): Application|RedirectResponse|Redirector
    {
        $validatedData = $request->toArray();
        $action->handle($validatedData);
        return redirect(route('admin.functions'));
    }
}
