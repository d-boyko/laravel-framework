<?php

namespace App\Actions;

use App\Contracts\RegisterActionContract;
use App\Http\Requests\RegistrationProcess\UserRegistrationRequest;

class RegisterGroupAction
{
    protected RegisterActionContract $registerActionContract;
    protected SendEmailNewUserAction $sendEmailNewUserAction;

    public function __construct(
        RegisterActionContract $registerActionContract,
        SendEmailNewUserAction $sendEmailNewUserAction,
    )
    {
        $this->registerActionContract = $registerActionContract;
        $this->sendEmailNewUserAction = $sendEmailNewUserAction;
    }

    public function handle(UserRegistrationRequest $data)
    {
        $user = $this->registerActionContract->handle($data);
        $this->sendEmailNewUserAction->handle($data->all());

        return $user;
    }
}
