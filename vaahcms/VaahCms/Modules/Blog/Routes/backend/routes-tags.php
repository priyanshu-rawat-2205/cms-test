<?php

use VaahCms\Modules\Blog\Http\Controllers\Backend\TagsController;

Route::group(
    [
        'prefix' => 'backend/blog/tags',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [TagsController::class, 'getAssets'])
        ->name('vh.backend.blog.tags.assets');
    /**
     * Get List
     */
    Route::get('/', [TagsController::class, 'getList'])
        ->name('vh.backend.blog.tags.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [TagsController::class, 'updateList'])
        ->name('vh.backend.blog.tags.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [TagsController::class, 'deleteList'])
        ->name('vh.backend.blog.tags.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [TagsController::class, 'fillItem'])
        ->name('vh.backend.blog.tags.fill');

    /**
     * Create Item
     */
    Route::post('/', [TagsController::class, 'createItem'])
        ->name('vh.backend.blog.tags.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [TagsController::class, 'getItem'])
        ->name('vh.backend.blog.tags.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [TagsController::class, 'updateItem'])
        ->name('vh.backend.blog.tags.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [TagsController::class, 'deleteItem'])
        ->name('vh.backend.blog.tags.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [TagsController::class, 'listAction'])
        ->name('vh.backend.blog.tags.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [TagsController::class, 'itemAction'])
        ->name('vh.backend.blog.tags.item.action');

    //---------------------------------------------------------

});
