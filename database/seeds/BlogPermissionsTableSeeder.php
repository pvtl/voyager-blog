<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class BlogPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_blog_posts',
            'read_blog_posts',
            'edit_blog_posts',
            'add_blog_posts',
            'delete_blog_posts',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('blog_posts');
    }
}
