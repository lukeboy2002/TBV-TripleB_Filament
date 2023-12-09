<?php

namespace Database\migrations;

use App\Models\Member;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RuudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ruud',
            'email' => 'ruud@tbv-tripleB.nl',
            'email_verified_at' => now(),
            'password' => Hash::make('ruudruud'),
            'remember_token' => Str::random(10),
        ]);

        Member::create([
            'user_id' => $user->id,
            'image' => "members/Ruud.jpg"
        ]);

        //generate image
        $name = get_initials($user->name);
        $id = $user->id.'.png';
        $path = '/profile-photos/';
        $imagePath = create_avatar($name, $id, $path);

        //save image
        $user->profile_photo_path = $imagePath;
        $user->save();

        $role = Role::select('id')->where('name', 'member')->first();

        $user->roles()->attach($role);
    }
}