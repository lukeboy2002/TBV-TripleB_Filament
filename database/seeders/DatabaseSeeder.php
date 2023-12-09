<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\members\AlbertSeeder;
use Database\Seeders\members\AntoineSeeder;
use Database\Seeders\members\BeukSeeder;
use Database\Seeders\members\BudSeeder;
use Database\Seeders\members\FransSeeder;
use Database\Seeders\members\GuusSeeder;
use Database\Seeders\members\JacSeeder;
use Database\Seeders\members\JohanSeeder;
use Database\Seeders\members\JohnSeeder;
use Database\Seeders\members\PatrickSeeder;
use Database\Seeders\members\RichardSeeder;
use Database\Seeders\members\RolandSeeder;
use Database\Seeders\members\RonSeeder;
use Database\Seeders\members\RuudSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AlbertSeeder::class);
        $this->call(AntoineSeeder::class);
        $this->call(BeukSeeder::class);
        $this->call(BudSeeder::class);
        $this->call(FransSeeder::class);
        $this->call(GuusSeeder::class);
        $this->call(JacSeeder::class);
        $this->call(JohanSeeder::class);
        $this->call(JohnSeeder::class);
        $this->call(PatrickSeeder::class);
        $this->call(RichardSeeder::class);
        $this->call(RolandSeeder::class);
        $this->call(RonSeeder::class);
        $this->call(RuudSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
