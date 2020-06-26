<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = './database/seeds/sql/t_user.sql';

        DB::unprepared(\File::get(base_path($path)));
    }
}
