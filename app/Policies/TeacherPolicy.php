<?php

namespace App\Policies;

use App\Models\Teacher;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
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
        return $teacher->status == 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function update(Teacher $teacher): bool
    {
        return $teacher->status === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function delete(Teacher $teacher): bool
    {
        return $teacher->status === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param Teacher $teacher
     * @return bool
     */

    public function show(Teacher $teacher): bool
    {
        return $teacher->status === 'admin';
    }
}
