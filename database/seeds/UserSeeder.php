<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user');

        $admin = User::create([
            'lastname' => 'admin',
            'email'=> 'admin@test.com',
            'password' => Hash::make('rootroot'),
        ]);

        $member = User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'birthdate' => '2000-01-01',
            'email'=> 'member@test.com',
            'password' => Hash::make('member'),
        ]);

        $test = User::create([
            'firstname' => 'test',
            'lastname' => 'test',
            'birthdate' => '2000-01-01',
            'email'=> 'test@test.com',
            'password' => Hash::make('test'),
        ]);
        
        $adminRole = Role::where('name','admin')-> first();
        $memberRole = Role::where('name','member')-> first();

        $admin -> roles() -> attach($adminRole);
        $member -> roles() -> attach($memberRole);
        $test -> roles() -> attach($memberRole);
    }
}
