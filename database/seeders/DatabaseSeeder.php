<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $categories=[
        'furniture',
        'watches',
        'shoes',
        'clothing',
        'paintings',
        'books',
        'jewelry',
        'electronics',
        'vehicles',
        'music',

    ];
    public function run(): void
    {
       
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
