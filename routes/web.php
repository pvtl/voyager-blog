<?php

$namespace = '\Pvtl\VoyagerBlog\Http\Controllers';

if (class_exists('\Pvtl\VoyagerFrontend\Http\Controllers\PostController')) {
    $namespace = '\Pvtl\VoyagerFrontend\Http\Controllers';
}

Route::group([
    'prefix' => 'posts', // Must match its `slug` record in the DB > `data_types`
    'middleware' => ['web'],
    'as' => 'voyager-blog.posts.',
    'namespace' => $namespace,
], function () {
    Route::get('/', ['uses' => 'PostController@getPosts', 'as' => 'list']);
    Route::get('{slug}', ['uses' => 'PostController@getPost', 'as' => 'post']);
});
