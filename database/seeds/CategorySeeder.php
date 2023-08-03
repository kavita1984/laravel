<?php
use Illuminate\Database\Seeder;
use App\Categorie;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categorie::create([
			'category_name' => 'Category 1',
		]);
        Categorie::create([
			'category_name' => 'Category 2',
		]);
    }
}