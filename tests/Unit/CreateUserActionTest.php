<?php

namespace Tests\Unit;

use App\Actions\CreateUserAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateUserActionTest extends TestCase
{
    use RefreshDatabase;

    private CreateUserAction $action;

    public function setUp(): void
    {
        parent::setUp();
        $this->action = new CreateUserAction();
    }

    /**
     * A basic unit test example.
     *
     * @return Model|User
     */
    public function testRegisterUserAction(): User|Model
    {
        $user = User::make([
            'name' => 'User was createdv2',
            'email' => Str::random(10),
            'password' => 'test_password',
        ]);

        $response = $this->action->handle();
        $this->assertEquals($user->name, $response->name);

        return $response;
    }

    public function testModelExists()
    {
        $this->assertModelExists($this->testRegisterUserAction());
    }
}
