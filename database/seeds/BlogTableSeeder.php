<?php

use Pvtl\VoyagerBlog\BlogPost;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Seed our example blog posts
        $firstBlogPost = $this->findBlogPost('my-first-blog-post');
        if (!$firstBlogPost->exists) {
            $firstBlogPost->fill([
                'author_id' => '0',
                'category_id' => '1',
                'title' => 'My First Blog Post',
                'excerpt' => 'An example blog post',
                'body' => '<p>Matey yardarm topmast broadside nipper weigh anchor jack quarterdeck crow\'s nest rigging. Topgallant lateen sail line avast me gun Pirate Round strike colors bilge rat take a caulk. Jack six pounders spanker doubloon clipper spirits case shot hang the jib boatswain red ensign.</p>
<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'slug' => 'my-first-blog-post',
                'meta_description' => 'A test blog post',
                'status' => 'PUBLISHED',
                'featured' => 0,
                'published_date' => '2018-05-11 00:00:00',
            ])->save();
        }

        $secondBlogPost = $this->findBlogPost('my-second-blog-post');
        if (!$secondBlogPost->exists) {
            $secondBlogPost->fill([
                'author_id' => '0',
                'category_id' => '1',
                'title' => 'My Second Blog Post',
                'excerpt' => 'An example blog post',
                'body' => '<p>Matey yardarm topmast broadside nipper weigh anchor jack quarterdeck crow\'s nest rigging. Topgallant lateen sail line avast me gun Pirate Round strike colors bilge rat take a caulk. Jack six pounders spanker doubloon clipper spirits case shot hang the jib boatswain red ensign.</p>
<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'slug' => 'my-second-blog-post',
                'meta_description' => 'A test blog post',
                'status' => 'PUBLISHED',
                'featured' => 0,
                'published_date' => '2018-05-11 00:00:00',
            ])->save();
        }
    }

    protected function findBlogPost($slug)
    {
        return BlogPost::firstOrNew(['slug' => $slug]);
    }
}
