<?php

namespace Database\Seeders;

use App\Models\Achievment;
use App\Models\Arsip;
use Faker\Factory;
use App\Models\Taj;
use App\Models\Guru;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Ekskul;
use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder in smaller batches
        DB::transaction(function () {
            Taj::factory()->create(['name' => '2024-2025', 'chief' => 'Murtaki Shihab']);
        });

        // DB::transaction(function () {
        //     User::factory(4)->create();
        // });

        DB::transaction(function () {
            Post::factory(10)->create();
        });

        DB::transaction(function () {
            Category::factory(5)->create();
        });

        DB::transaction(function () {
            Guru::factory(20)->create();
        });

        DB::transaction(function(){
            Ekskul::factory(10)->create();
        });

        DB::transaction(function(){
            Galeri::factory(30)->create();
        });

        DB::transaction(function(){
            Achievment::factory(25)->create();
        });

        DB::transaction(function(){
            Arsip::factory(25)->create();
        });

        // DB::transaction(function () {
        //     Student::factory(10)->create();
        // });

        // DB::transaction(function () {
        //     Sambutan::factory(1)->create();
        // });

        User::factory()->create([
            'name' => 'Murtaki',
            'username' => 'murtaki99',
            'email' => 'admin@gmail.com',
            'phone' => '082279761815',
            'password' => bcrypt('123'),
            'role' => 'admin',
        ]);
    }
}
