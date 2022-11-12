<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OoapTblEmployee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'ooap_tbl_employees';

    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'role_id',
        'emp_citizen_id',
        'from_type',
        'title_th',
        'fname_th',
        'lname_th',
        'posit_id',
        'posit_name_th',
        'positlevel_id',
        'level_no',
        'positlevel_name',
        'direc_id',
        'direc_name',
        'department_id',
        'dept_name_th',
        'division_id',
        'division_name',
        'personal_type_id',
        'personal_type_name',
        'orgname_id',
        'orgname_type',
        'prefix_id',
        'prefix_name_th',
        'dep_div_id',
        'start_work',
        'birthday',
        'address',
        'phone',
        'email',
        'remark',
        'myooapsys',
        'status', 'in_active', 'remember_token', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];


    public function roles()
    {
        return $this->hasOne(OoapMasRole::class, 'role_id', 'role_id');
        // ->belongsToMany(OoapMasRole::class, 'role_id', 'role_id')
        // ->withTimestamps();
    }

    public function users()
    {
        return $this
            ->belongsToMany(OoapTblEmployee::class)
            ->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('role_name', '=', $role)->first()) {
            return true;
        }
        // dd($role);
        return false;
    }
}
