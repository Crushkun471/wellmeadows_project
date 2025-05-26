<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks before truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate child tables first to avoid FK conflicts
        DB::table('beds')->truncate();
        DB::table('wards')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Now seed wards first, then beds
        $this->call(WardSeeder::class);
        $this->call(BedSeeder::class);
    }
}
