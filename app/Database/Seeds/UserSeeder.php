<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

		$user_object->insertBatch([
			[
				"name" => "Rahul Sharma",
				"username" => "rahul_sharma@mail.com",
				"phone_no" => "7899654125",
				"role" => "admin",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			],
			[
				"name" => "Prabhat Pandey",
				"username" => "prabhat@mail.com",
				"phone_no" => "8888888888",
				"role" => "user",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
            ],
            [
				"name" => "Mohammad rafly",
				"username" => "mohammadrafly19@gmail.com",
				"phone_no" => "88888888881",
				"role" => "superadmin",
				"password" => password_hash("r4v14ever", PASSWORD_DEFAULT)
			]
		]);
    }
}
