<?php
use Illuminate\Database\Seeder;
use App\SubCategorie;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SubCategorie::create([
			'sub_category_name' => 'Category 1.1',
			'category_id' => 1,
		]);
        SubCategorie::create([
			'sub_category_name' => 'Category 1.2',
			'category_id' => 1,
		]);

		SubCategorie::create([
			'sub_category_name' => 'Category 2.1',
			'category_id' => 2,
		]);
        SubCategorie::create([
			'sub_category_name' => 'Category 2.2',
			'category_id' => 2,
		]);
    }
}