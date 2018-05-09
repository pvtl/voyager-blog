<?php

namespace Pvtl\VoyagerBlog\Http\Controllers;

use Pvtl\VoyagerBlog\BlogPost;
use Illuminate\Support\Carbon;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class PostController extends VoyagerBaseController
{
    protected $viewPath = 'voyager-blog';

    /**
     * Route: Gets all posts and passes data to a view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPosts()
    {
        // Get featured post
        $featuredPost = BlogPost::where([
                ['status', '=', 'PUBLISHED'],
                ['featured', '=', '1'],
            ])->whereDate('published_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->first();
        $featuredPostId = $featuredPost ? $featuredPost->id : 0;

        // Get all posts
        $posts = BlogPost::where([
                ['status', '=', 'PUBLISHED'],
                ['id', '!=', $featuredPostId],
            ])->whereDate('published_date', '<=', Carbon::now())
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view("{$this->viewPath}::modules/posts/posts", [
            'featuredPost' => $featuredPost,
            'posts' => $posts,
        ]);
    }

    /**
     * Route: Gets a single posts and passes data to a view
     *
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($slug)
    {
        // The post
        $post = BlogPost::where([
                ['slug', '=', $slug],
                ['status', '=', 'PUBLISHED'],
            ])->whereDate('published_date', '<=', Carbon::now())
            ->firstOrFail();

        // Related posts (based on tags)
        $relatedPosts = array();
        if (!empty(trim($post->tags))) {
            $tags = explode(',', $post->tags);
            $relatedPosts = BlogPost::where([
                    ['id', '!=', $post->id],
                ])->where(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        $query->orWhere('tags', 'LIKE', '%'.trim($tag).'%');
                    }
                })->limit(4)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view("{$this->viewPath}::modules/posts/post", [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }
}
