<?php

use VaahCms\Modules\Blog\Http\Controllers\Backend\BlogsController;

Route::group(
    [
        'prefix' => 'backend/blog/blogs',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [BlogsController::class, 'getAssets'])
        ->name('vh.backend.blog.blogs.assets');
    /**
     * Get List
     */
    Route::get('/', [BlogsController::class, 'getList'])
        ->name('vh.backend.blog.blogs.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [BlogsController::class, 'updateList'])
        ->name('vh.backend.blog.blogs.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [BlogsController::class, 'deleteList'])
        ->name('vh.backend.blog.blogs.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [BlogsController::class, 'fillItem'])
        ->name('vh.backend.blog.blogs.fill');

    /**
     * Create Item
     */
    Route::post('/', [BlogsController::class, 'createItem'])
        ->name('vh.backend.blog.blogs.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [BlogsController::class, 'getItem'])
        ->name('vh.backend.blog.blogs.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [BlogsController::class, 'updateItem'])
        ->name('vh.backend.blog.blogs.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [BlogsController::class, 'deleteItem'])
        ->name('vh.backend.blog.blogs.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [BlogsController::class, 'listAction'])
        ->name('vh.backend.blog.blogs.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [BlogsController::class, 'itemAction'])
        ->name('vh.backend.blog.blogs.item.action');

    //---------------------------------------------------------

});
