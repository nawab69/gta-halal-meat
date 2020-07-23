<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Root',
            'description'   =>  'This is the root category, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Beef',
            'description'   =>  'Beef Description is Here',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Mutton',
            'description'   =>  'Mutton Description is Here',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Chicken',
            'description'   =>  'Chicken Description is Here',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]);


    }
}
