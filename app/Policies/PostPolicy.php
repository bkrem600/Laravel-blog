<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UploadPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // index listening
        return true;
    }

    public function view(User $user, Post $post)
    {
        // view just one
        return true;
    }

    public function create(User $user)
    {
        // access to create functionality, any user
        return $user->email === 'boryana.kremakova@gmail.com';
    }

    public function update(User $user, Post $post)
    {
        // access to edit functionality enforcing ownership of upload

        return $user->email === 'boryana.kremakova@gmail.com';
    }

    public function delete(User $user, Post $post)
    {
        // access to delete functionality enforcing ownership of upload
        return $user->email === 'boryana.kremakova@gmail.com';
    }

    public function restore(User $user, Post $post)
    {
        // not implemented
        return false;
    }

    public function forceDelete(User $user, Post $post)
    {
        // not implemented
        return false;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
