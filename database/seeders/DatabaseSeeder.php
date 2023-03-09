<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Student;
use App\Models\StudentCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Book::factory(25)->create();

        $list = ["General", "Mobile", "Art", "Tech", "Language"];
        foreach ($list as $name)
        Category::create([
            "name" => $name
        ]);

        // Student::factory(100)->create();
        User::factory(20)->create();

        $data = ["Under Graduate", "Post Graduate", "Certificate Level"];
        foreach ($data as $name)
        StudentCategory::create([
            "name" => $name,
            "max_allow" => '10'
        ]);

        $branch = ["Tamwe", "Botahtaung", "Latha", "Pansoedan", "Thanlyin"];
        foreach ($branch as $name)
        Branch::create([
            "name" => $name,
        ]);
    }
}
