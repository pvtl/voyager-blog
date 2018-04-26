<?php

use Pvtl\VoyagerPosts\Post;

use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeder;

class PostsDatabaseSeeder extends Seeder
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
        $this->seed('PostsTableSeeder');
    }
}
