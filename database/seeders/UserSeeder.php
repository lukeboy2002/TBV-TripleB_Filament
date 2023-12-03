<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 5; $i++) {
            $user = User::create([
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@user.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // password
                'remember_token' => Str::random(10),
            ]);

            //generate image
            $name = get_initials($user->name);
            $id = $user->id.'.png';
            $path = '/profile-photos/';
            $imagePath = create_avatar($name, $id, $path);

            //save image
            $user->profile_photo_path = $imagePath;
            $user->save();

            $role = Role::select('id')->where('name', 'user')->first();

            $user->roles()->attach($role);
        }
    }
}
