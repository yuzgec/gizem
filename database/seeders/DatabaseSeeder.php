<?php

namespace Database\Seeders;
use App\Models\BlogCategory;
use App\Models\PageCategory;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);


        ServiceCategory::create(['title' => 'Hizmetler']);
        BlogCategory::create(['title' => 'Bloglar']);
        PageCategory::create(['title' => 'Kurumsal']);
    }
}
