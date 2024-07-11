<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $categories=[
        'Furniture',
        'Watches',
        'Shoes',
        'Clothing',
        'Paintings',
        'Books',
        'Jewelry',
        'Electronics',
        'Vehicles',
        'Music',

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
