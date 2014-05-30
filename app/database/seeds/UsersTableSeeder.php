<?php

class UsersTableSeeder extends Seeder {

  public function run()
  {
    User::create([
      'username'  => 'andrew',
      'password'  => 'password'
    ]);
  }
}
