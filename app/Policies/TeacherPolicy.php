<?php

namespace App\Policies;

use App\Models\Teacher;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function viewAny(Teacher $teacher): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function view(Teacher $teacher): bool
    {
//        return $teacher->
    }

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

    /**
     * Determine whether the user can restore the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function restore(Teacher $teacher): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param Teacher $teacher
     * @return bool
     */
    public function forceDelete(Teacher $teacher): bool
    {
        //
    }
}
