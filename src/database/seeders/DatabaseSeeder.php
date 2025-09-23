<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class); // 先にカテゴリを投入
        \App\Models\Contact::factory(35)->create(); // 35件のダミーデータ
    }
}
