<?php

namespace App\Policies;

use App\Models\Parents;
use App\Models\Teacher;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentsPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create models.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function create(Teacher $teacher): bool
    {
        return $this->isAdministrator($teacher);
    }

    /**
     * Perform last login method
     * @param Teacher $teacher
     * @return bool
     */

    public function last_login(Teacher $teacher): bool
    {
        return $this->isAdministrator($teacher);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function update(Teacher $teacher): bool
    {
        return $this->isAdministrator($teacher);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function delete(Teacher $teacher): bool
    {
        return $this->isAdministrator($teacher);
    }

    public function isAdministrator($teacher): bool
    {
        return $teacher->status === 'admin';
    }
}
