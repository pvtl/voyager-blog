<?php

use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeder;

class BlogDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('BlogDataTypesTableSeeder');
        $this->seed('BlogDataRowsTableSeeder');
        $this->seed('BlogPermissionsTableSeeder');
        $this->seed('BlogPermissionRoleTableSeeder');
        $this->seed('BlogMenuItemsTableSeeder');
        $this->seed('BlogTableSeeder');

        $this->seed('BlogCategoriesDataTypesTableSeeder');
        $this->seed('BlogCategoriesTableSeeder');
    }
}
