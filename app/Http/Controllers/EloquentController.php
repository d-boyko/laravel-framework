<?php

namespace App\Http\Controllers;

use App\Actions\ExportDatabaseTables;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;

class EloquentController extends Controller
{
    /**
     * @return void
     */
    #[NoReturn] public function getAllUsers()
    {
        // SELECT * FROM users;
        $users = User::all();
        dd($users);
    }

    /**
     * @return void
     */
    #[NoReturn] public function getModelsWithConditions()
    {
        $users = User::where('is_active', true)
            ->orderBy('name')
            ->take(10)
            ->get();

        dd($users);
    }

    /**
     * @return void
     */
    public function getNamesOfUsers(): void
    {
        $users = User::all();

        foreach ($users as $name) {
            echo $name->name . '<br>';
        }
    }

    #[NoReturn] public function freshMethod()
    {
        $user = User::where('email', '=', 'trycia15@example.net')->first();
        $user->email = 'd.boyko.test@sxope.com';
        $freshUser = $user->fresh();

        dd($freshUser, $user);
    }

    #[NoReturn] public function refreshMethod()
    {
        $user = User::where('email', '=', 'trycia15@example.net')->first();
        $user->email = 'd.boyko.test@sxope.com';
        $freshUser = $user->refresh();

        dd($freshUser, $user);
    }

    #[NoReturn] public function getAllUsersColumns()
    {
        $users = User::all();
        dd($users);
    }

    #[NoReturn] public function getUsersInfoByLike()
    {
        $users = User::where('name', 'like', 'Prof%')
            ->take(10)
            ->get();
        dd($users);
    }

    #[NoReturn] public function getUsersInfoById()
    {
        $users = User::where('name', 'like', 'Prof%')
            ->take(10)
            ->get();
        dd($users);
    }

    #[NoReturn] public function getFirstRowWithResponse()
    {
        $userInfo = User::where('name', 'LIKE', 'Prof.%')
            ->first();
        dd($userInfo);
    }

    public function getUsersNamesByChunkSystem()
    {
        User::chunk(30, function ($users) {
            foreach ($users as $user) {
                echo $user->name;
            }
        });
    }

    #[NoReturn] public function updateUsersByChunkId()
    {
        $update = User::where('is_active', true)
            ->chunkById(200, function ($users) {
                $users->each->update(['is_active' => false]);
            }, $column = 'id');
        dd($update);
    }

    #[NoReturn] public function refreshUsersInfo()
    {
        $user = User::all()->first();
        $user->name = 'SXOPE Inc.';
        echo $user->name;
        dd($user);
    }

    #[NoReturn] public function getPostByUserModel()
    {
        $response = User::find(17)
            ->posts()
            ->orderByDesc('title')
            ->take(10)
            ->get();

        foreach ($response as $post) {
            echo $post->title . PHP_EOL;
        }

        dd($response);
    }

    #[NoReturn] public function getUserByPostModel()
    {
        $response = Post::find(17)
            ->user()
            ->get();

        foreach ($response as $user) {
            echo $user->name;
        }

        dd($response);
    }

    #[NoReturn] public function getUserNameByPost()
    {
        $post = Post::find(1);
        echo $post->user->name;
        dd($post);
    }

    #[NoReturn] public function updateUsersNamesByLazy()
    {
        $users = User::where('name', 'like', 'Prof%')
            ->lazyById(200, $column = 'id')
            ->each->update(['name' => 'SXOPE Inc.']);

        dd($users);
    }

    #[NoReturn] public function getLastUserInfoBySubQuery()
    {
        $users = User::addSelect(['created_at' => Post::select('title')
            ->whereColumn('posts.user_id', 'users.id')
        ])->orderByDesc('users.created_at')->limit(1);

        dd($users);
    }

    #[NoReturn] public function getCountOfRelatedModels()
    {
        $users = User::first();
        $count = $users->loadCount('post');
        dd($count);
    }

    #[NoReturn] public function getCountOfRelatedModelsWithCondition()
    {
        $users = User::first();
        $count = $users->loadCount(['post' => function($query) {
            $query->where('is_published', true);
        }]);
        dd($count);
    }

    #[NoReturn] public function getCountWithSelectFunction()
    {
        $users = User::select(['name', 'email'])
            ->withCount('post')
            ->get();
        dd($users);
    }

    public function getUserModelByfirstWhereMethod()
    {
        $user = User::firstWhere('email', 'like', '%example.com');
        echo $user->email;
    }

    public function getUserModelWithFirstOrMethod()
    {
        $users = User::where('id', '=', '100')
            ->firstOr(function () {
                return 1111111;
            });

        if (gettype($users) == 'array') {
            foreach ($users as $user) {
                echo $user->name;
            }
        }
        else {
            echo $users;
        }
    }

    /**
     * @throws Exception
     */
    #[NoReturn] public function selectOrCreateUser()
    {
        $user = User::firstOrCreate([
            'name' => 'Daniil Boyko',
            'email' => 'd.boyko@sxope.com',
            'password' => 'some_password',
            'agreement' => true,
            'remember_token' => Str::uuid(),
            'is_active' => true,
            'is_admin' => true,
            'age' => random_int(20,30),
        ]);

        dd($user);
    }

    #[NoReturn] public function getCountOfUsers()
    {
        $count = User::where('name', 'like', 'SXOPE%')
            ->count();

        dd($count);
    }

    public function updateUserModel()
    {
        $user = User::find(1);
        $user->name = 'Daniil Boyko Company';
        $user->save();
    }

    public function massiveUpdateUserModel()
    {
        User::where('is_active', '=', 1)
            ->where('name', 'like', 'Daniil%')
            ->update(['is_admin' => true]);
    }

    #[NoReturn] public function isUserDirtyOrClean()
    {
        $user = User::create([
            'name' => 'Test',
            'email' => 'test@sxope.com',
            'password' => 'for_change',
            'is_active' => true,
            'age' => 20,
        ]);

        $user->password = 'after_change_password';
        $isUserDirty = $user->isDirty();
        $isUserNameDirty = $user->isDirty('name');
        $isUserPasswordDirty = $user->isDirty('password');
        $isUserClean = $user->isClean();
        $isUserNameClean = $user->isClean('name');
        $isUserPasswordClean = $user->isClean('password');
        $user->save();

        $isUserDirtyAfterSaving = $user->isDirty();
        $isUserCleanAfterSaving = $user->isClean();
        dd(
            $isUserDirty,
            $isUserClean,
            $isUserNameDirty,
            $isUserNameClean,
            $isUserPasswordDirty,
            $isUserPasswordClean,
            $isUserDirtyAfterSaving,
            $isUserCleanAfterSaving
        );
    }

    #[NoReturn] public function isUserModelChanged()
    {
        $user = User::create([
            'name' => 'TestWasChanged',
            'email' => 'testWasChanged@sxope.com',
            'password' => 'for_change_test',
            'is_active' => false,
            'age' => 10,
        ]);

        $user->title = 'some_another_name';
        $user->save();

        $isModelChanged = $user->wasChanged();
        $isUserNameChanged = $user->wasChanged('name');
        $isUserEmailChanged = $user->wasChanged('email');

        dd(
            $isModelChanged,
            $isUserNameChanged,
            $isUserEmailChanged,
        );
    }

    #[NoReturn] public function getOriginalValue()
    {
        $user = User::find(1);
        $user->name = "Jack";
        $getOriginalName = $user->getOriginal('name');
        $getOriginalModel = $user->getOriginal();

        dd(
            $getOriginalName,
            $getOriginalModel
        );
    }

    #[NoReturn] public function updateOrCreate()
    {
        $user = User::updateOrCreate(
        // if exists   | else create ->
            ['name' => 'Daniil Boyko', 'is_active' => true],
            // then update | else create ->
            ['password' => 'new_password_after_update', 'is_admin' => 1],
        );

        dd($user);
    }

    #[NoReturn] public function deleteModel()
    {
        // If you have dependencies with some other table, you should make
        // your foreign_key cascadeOnDelete
        $user = User::find(3);
        $delete = $user->forceDelete();
        dd($delete);
    }

    #[NoReturn] public function truncateModel()
    {
        $user = User::truncate();
        dd($user);
    }

    #[NoReturn] public function destroyModel()
    {
        // DELETING the model in "deleteModel" method processing with initializing model
        // DESTROYING the model in "destroyModel" method processing without initializing model

        $user = User::destroy(2);
        $user = User::destroy([3,4,5]);

        dd($user);
    }

    #[NoReturn] public function deleteByWhereClause()
    {
        $deletedRows = User::where('email', '=', 'americo.haley@example.org')
            ->delete();

        dd($deletedRows);
    }

    #[NoReturn] public function deleteBySoftDeletes()
    {
        // After migration with adding column deleted_at to users table
        $user = User::where('email', '=', 'wilson20@example.org');
        $user->delete();

        dd($user);
    }

    #[NoReturn] public function createAfterSoftDelete()
    {
        $user = User::withTrashed()
            ->where('email', '=', 'wilson20@example.org')
            ->restore();

        dd($user);
    }

    #[NoReturn] public function forceDelete()
    {
        //  Without restoring as in "createAfterSoftDelete" method
        $user = User::where('email', '=', 'wilson20@example.org')
            ->forceDelete();

        dd($user);
    }

    #[NoReturn] public function replicatingModels()
    {
        $user = User::create([
            'name' => 'Daniil Boyko',
            'email' => 'test-email@sxope.com',
            'password' => 'some_password',
            'agreement' => true,
            'remember_token' => Str::uuid(),
            'is_active' => true,
            'is_admin' => true,
            'age' => 20,
        ]);

        $replicating = $user->replicate()->fill([
            'email' => 'test-email-after-replicating@sxope.com',
            'password' => 'after_replicating_password',
        ]);

        $replicating->save();

        dd($replicating);
    }

    #[NoReturn] public function nonReplicatingFields()
    {
        $user = User::create([
            'name' => 'Daniil Boyko',
            'email' => 'test-email-before-replicating@sxope.com',
            'password' => 'some_password',
            'agreement' => true,
            'remember_token' => Str::uuid(),
            'is_active' => true,
            'is_admin' => true,
            'age' => 20,
        ]);

        $replicating = $user->replicate()->fill([
            'email' => 'some_new_email_after_replicating@sxope.com',
        ]);

        $replicating->save();

        dd($replicating);
    }

    public function testCsv(ExportDatabaseTables $databaseTables)
    {
        $databaseTables->handle();
    }

    #[NoReturn] public function testSubQueries()
    {
        $query = User::select(['name', 'password', 'email'])
            ->orderByDesc(
                Post::select('is_published')
                    ->whereColumn('user_id', 'users.id')
                    ->orderByDesc('is_published')
                    ->limit(1))->toSql();

        dd($query);
    }

    #[NoReturn] public function findUserPhone($userId)
    {
        $phone = User::find($userId)->phone;
        dd($phone);
    }
}
