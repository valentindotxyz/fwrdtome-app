<?php

use App\Enums\Configurations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Configurations::getAll() as $configuration) {
            DB::table('configurations')->insert(
                ['key' => $configuration, 'value' => 0]
            );
        }
    }
}
