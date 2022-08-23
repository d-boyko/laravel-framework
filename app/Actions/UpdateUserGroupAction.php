<?php

namespace App\Actions;

class UpdateUserGroupAction
{
    protected UpdateUserAction $updateUserAction;
    protected SendEmailUpdateUserAction $sendEmailUpdateUserAction;

    public function __construct(
        UpdateUserAction $updateUserAction,
        SendEmailUpdateUserAction $sendEmailUpdateUserAction,
    )
    {
        $this->updateUserAction = $updateUserAction;
        $this->sendEmailUpdateUserAction = $sendEmailUpdateUserAction;
    }

    /**
     * @param $data
     * @return void
     */
    public function handle($data): void
    {
        $this->updateUserAction->handle($data);
        $this->sendEmailUpdateUserAction->handle($data);
    }
}
