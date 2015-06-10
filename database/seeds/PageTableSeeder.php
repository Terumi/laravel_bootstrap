<?php
	use App\Page;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;

	class PageTableSeeder extends Seeder {

		public function run() {
			DB::table('pages')->truncate();
			$faker = Faker\Factory::create();

			$parents = [];

			foreach(range(0, 40) as $index){
				$title =  $faker->company();
				$parents[] = rand(0, 40);

				/* echo */
					echo $title."\n";
					echo slugify($title);
				/* echo */

				Page::create([
					"parent_id"        => array_rand($parents),
					"title"            => $title,
					"menu_title"       => $title,
					"slug"             => slugify($title),
					"body"             => $faker->text(250),
					"description"      => $faker->sentence(),
					"priority"         => rand(0, 10),
					"meta_content"     => "",
					"meta_title"       => "",
					"meta_description" => "",
					"meta_canonical"   => "",
				]);
			}
		}
	}
