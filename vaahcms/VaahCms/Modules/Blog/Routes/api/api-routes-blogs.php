<?php
use VaahCms\Modules\Blog\Http\Controllers\Backend\BlogsController;
/*
 * API url will be: <base-url>/public/api/blog/blogs
 */
Route::group(
    [
        'prefix' => 'blog/blogs',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [BlogsController::class, 'getAssets'])
        ->name('vh.backend.blog.api.blogs.assets');
    /**
     * Get List
     */
    Route::get('/', [BlogsController::class, 'getList'])
        ->name('vh.backend.blog.api.blogs.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [BlogsController::class, 'updateList'])
        ->name('vh.backend.blog.api.blogs.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [BlogsController::class, 'deleteList'])
        ->name('vh.backend.blog.api.blogs.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [BlogsController::class, 'createItem'])
        ->name('vh.backend.blog.api.blogs.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [BlogsController::class, 'getItem'])
        ->name('vh.backend.blog.api.blogs.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [BlogsController::class, 'updateItem'])
        ->name('vh.backend.blog.api.blogs.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [BlogsController::class, 'deleteItem'])
        ->name('vh.backend.blog.api.blogs.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [BlogsController::class, 'listAction'])
        ->name('vh.backend.blog.api.blogs.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [BlogsController::class, 'itemAction'])
        ->name('vh.backend.blog.api.blogs.item.action');



});
