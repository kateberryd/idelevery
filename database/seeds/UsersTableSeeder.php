<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $superAdminCredentials = [
      'first_name' => 'Super',
      'last_name' => 'Admin',
      // 'phone' => '1234567890',
      'email' => 'superadmin@idelivery.com.ng',
      'username' => 'superadmin',
      'password' => 'secret',
      'user_role' => 'superadmin',
      'slug' => 'super-admin',
    ];
    
    $superAdmin = Sentinel::registerAndActivate($superAdminCredentials, true);
    $role = Sentinel::findRoleBySlug('superadmin');
    $role->users()->attach($superAdmin);
    
    $adminCredentials = [
      'first_name' => 'Admin',
      'last_name' => 'Admin',
      // 'phone' => '1234567890',
      'email' => 'admin@idelivery.com.ng',
      'username' => 'admin',
      'password' => 'secret',
      'user_role' => 'admin',
      'slug' => 'admin'      
    ];
  
    $admin = Sentinel::registerAndActivate($adminCredentials, true);
    $role = Sentinel::findRoleBySlug('admin');
    $role->users()->attach($admin);
    
    $userCredentials = [
      'first_name' => 'Vendor',
      'last_name' => 'Tester',
      // 'phone' => '1234567890',
      'email' => 'vendor@idelivery.com.ng',
      'username' => 'vendor',
      'user_role' => 'vendor',
      'password' => 'secret',
      'slug' => 'vendor',
    ];
    
    $user = Sentinel::registerAndActivate($userCredentials, true);
    $role = Sentinel::findRoleBySlug('vendor');
    $role->users()->attach($user);

    $userCredentials = [
      'first_name' => 'User',
      'last_name' => 'tester',
      // 'phone' => '1234567890',
      'email' => 'user@idelivery.com.ng',
      'username' => 'user',
      'user_role' => 'user',
      'password' => 'secret',
      'slug' => 'user',
    ];
    
    $user = Sentinel::registerAndActivate($userCredentials, true);
    $role = Sentinel::findRoleBySlug('user');
    $role->users()->attach($user);
  }
}
