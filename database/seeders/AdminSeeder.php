<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\EmploymentStatus;
use App\Models\Profile;
use App\Models\UserEmploymentStatus;
use App\Models\WorkShift;
use App\Models\WorkShiftDetail;
use App\Models\WorkingShiftUser;
use App\Models\Designation;
use App\Models\JobHistory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'is_employee' => 0,
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
        ]);

        $admin_role = Role::create([
                        'name'=>'Admin',
                        'guard_name'=>'web',
                    ]);

        $permissions = [
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'permission-list', 'permission-create', 'permission-edit', 'permission-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
            'logactivity-list', 'logactivity-create', 'logactivity-edit', 'logactivity-delete',
        ];
        foreach ($permissions as $permission) {
            $label = explode('-', $permission);
            Permission::create([
                'label' => $label[0],
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
        $permissions = Permission::get();
        $admin_role->givePermissionTo($permissions);
        $admin->assignRole($admin_role);

        $department = Department::create([
            'manager_id' => $admin->id,
            'name' => "Main Department",
            'status' => 1,
        ]);

        DepartmentUser::create([
            'department_id' => $department->id,
            'user_id' => $admin->id,
            'start_date' => date('Y-m-d'),
        ]);

        $employment_status = EmploymentStatus::create([
            'name' => 'Probation',
            'class' => 'warning',
            'alias' => 'Probation',
            'is_default' => 1,
        ]);

        $designation = Designation::create([
            'title' => 'Vice President - Business Unit Head',
            'status' => 1,
        ]);

        JobHistory::create([
            'created_by' => $admin->id,
            'user_id' => $admin->id,
            'designation_id' => $designation->id,
            'employment_status_id' => $employment_status->id,
            'joining_date' => date('Y-m-d'),
        ]);

        UserEmploymentStatus::create([
            'user_id' => $admin->id,
            'employment_status_id' => $employment_status->id,
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d'),
        ]);

        $employment_status = EmploymentStatus::create([
            'name' => 'Permanent',
            'class' => 'primary',
            'alias' => 'Permanent',
            'is_default' => 0,
        ]);

        JobHistory::create([
            'created_by' => $admin->id,
            'user_id' => $admin->id,
            'designation_id' => $designation->id,
            'employment_status_id' => $employment_status->id,
            'joining_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d'),
        ]);

        UserEmploymentStatus::create([
            'user_id' => $admin->id,
            'employment_status_id' => $employment_status->id,
            'start_date' => date('Y-m-d'),
        ]);

        Profile::create([
            'user_id' => $admin->id,
            'employment_id' => 1145,
            'joining_date' => date('Y-m-d'),
        ]);

        $work_shift = WorkShift::create([
            'name' => 'Night Shift (9 to 6)',
            'start_date' => '2023-01-01',
            'type' => 'regular',
            'status' => 1,
            'is_default' => 1,
        ]);

        // Define the week attributes
        $weekAttributes = [
            [
                'weekday_key' => 'Mon',
                'weekday' => 'Monday',
                'is_weekend' => false,
                'start_time' => '16:00',
                'end_time' => '1:00',
            ],
            [
                'weekday_key' => 'Tue',
                'weekday' => 'Tuesday',
                'is_weekend' => false,
                'start_time' => '16:00',
                'end_time' => '1:00',
            ],
            [
                'weekday_key' => 'Wed',
                'weekday' => 'Wednesday',
                'is_weekend' => false,
                'start_time' => '16:00',
                'end_time' => '1:00',
            ],
            [
                'weekday_key' => 'Thu',
                'weekday' => 'Thursday',
                'is_weekend' => false,
                'start_time' => '16:00',
                'end_time' => '1:00',
            ],
            [
                'weekday_key' => 'Fri',
                'weekday' => 'Friday',
                'is_weekend' => false,
                'start_time' => '16:00',
                'end_time' => '1:00',
            ],
            [
                'weekday_key' => 'Sat',
                'weekday' => 'Saturday',
                'is_weekend' => true,
                'start_time' => null,
                'end_time' => null,
            ],
            [
                'weekday_key' => 'Sun',
                'weekday' => 'Sunday',
                'is_weekend' => true,
                'start_time' => null,
                'end_time' => null,
            ],
        ];

        // Build the week array
        foreach ($weekAttributes as $attribute) {
            WorkShiftDetail::create([
                'working_shift_id' => $work_shift->id,
                'weekday_key' => $attribute['weekday_key'],
                'weekday' => $attribute['weekday'],
                'is_weekend' => $attribute['is_weekend'],
                'start_time' => $attribute['start_time'],
                'end_time' => $attribute['end_time'],
            ]);
        }

        WorkingShiftUser::create([
            'working_shift_id' => $work_shift->id,
            'user_id' => $admin->id,
            'start_date' => date('Y-m-d'),
        ]);
    }
}
