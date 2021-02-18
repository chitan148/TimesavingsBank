<?php

namespace App\Policies;

use App\User;
use App\UserDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * フォルダの閲覧権限
     * @param User $user
     * @param UserDetail $user_detail
     * @return bool
     */
    public function viewAuthority(User $user, UserDetail $user_detail)
    {
        return $user->id === $user_detail->user_id;
    }
}
