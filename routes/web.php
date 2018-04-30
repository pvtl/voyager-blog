<?php

Route::group([
    'prefix' => 'posts', // Must match its `slug` record in the DB > `data_types`
    'middleware' => ['web'],
    'as' => 'voyager-frontend.posts.',
    'namespace' => '\Pvtl\VoyagerFrontend\Http\Controllers'
], function () {
    Route::get('/', ['uses' => 'PostController@getPosts', 'as' => 'list']);
    Route::get('{slug}', ['uses' => 'PostController@getPost', 'as' => 'post']);
});
