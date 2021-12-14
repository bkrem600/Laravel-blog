<?php

namespace App\Policies;

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

    public function view(User $user, Upload $upload)
    {
        // view just one
        return true;
    }

    public function create(User $user)
    {
        // access to create functionality, any user
        return $user->id !== null;
    }

    public function update(User $user, Upload $upload)
    {
        // access to edit functionality enforcing ownership of upload
        
        return $user->id === $upload->user_id;
    }

    public function delete(User $user, Upload $upload)
    {
        // access to delete functionality enforcing ownership of upload
        return $user->id === $upload->user_id;
    }

    public function restore(User $user, Upload $upload)
    {
        // not implemented
        return false;
    }

    public function forceDelete(User $user, Upload $upload)
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
