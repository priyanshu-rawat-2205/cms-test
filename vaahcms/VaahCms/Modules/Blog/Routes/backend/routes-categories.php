<?php

use VaahCms\Modules\Blog\Http\Controllers\Backend\CategoriesController;

Route::group(
    [
        'prefix' => 'backend/blog/categories',
        
        'middleware' => ['web', 'has.backend.access'],
        
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', [CategoriesController::class, 'getAssets'])
        ->name('vh.backend.blog.categories.assets');
    /**
     * Get List
     */
    Route::get('/', [CategoriesController::class, 'getList'])
        ->name('vh.backend.blog.categories.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [CategoriesController::class, 'updateList'])
        ->name('vh.backend.blog.categories.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [CategoriesController::class, 'deleteList'])
        ->name('vh.backend.blog.categories.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', [CategoriesController::class, 'fillItem'])
        ->name('vh.backend.blog.categories.fill');

    /**
     * Create Item
     */
    Route::post('/', [CategoriesController::class, 'createItem'])
        ->name('vh.backend.blog.categories.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [CategoriesController::class, 'getItem'])
        ->name('vh.backend.blog.categories.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [CategoriesController::class, 'updateItem'])
        ->name('vh.backend.blog.categories.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [CategoriesController::class, 'deleteItem'])
        ->name('vh.backend.blog.categories.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [CategoriesController::class, 'listAction'])
        ->name('vh.backend.blog.categories.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [CategoriesController::class, 'itemAction'])
        ->name('vh.backend.blog.categories.item.action');

    //---------------------------------------------------------

});
