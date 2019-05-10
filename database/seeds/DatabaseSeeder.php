<?php

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
        // $this->call(UsersTableSeeder::class);
		DB::table('shares')->insert([
            'share_name' => 'Селедка',
            'share_price' => '60',
            'share_qty' => '10',
			'filepath' => 'herring.jpg',
        ]);
		DB::table('shares')->insert([
            'share_name' => 'Скумбрия',
            'share_price' => '60',
            'share_qty' => '10',
			'filepath' => 'mackarel.png',
        ]);
		DB::table('shares')->insert([
            'share_name' => 'Хек',
            'share_price' => '60',
            'share_qty' => '10',
			'filepath' => 'hake.jpg',
        ]);
		DB::table('shares')->insert([
            'share_name' => 'Окунь',
            'share_price' => '60',
            'share_qty' => '10',
			'filepath' => 'redfish.jpg',
        ]);
		DB::table('shares')->insert([
            'share_name' => 'Плотва',
            'share_price' => '60',
            'share_qty' => '10',
			'filepath' => 'roach.png',
        ]);
				DB::table('shares')->insert([
            'share_name' => 'мойва',
            'share_price' => '60',
            'share_qty' => '10',
			'filepath' => 'capelin.jpg',
        ]);
    }
}
