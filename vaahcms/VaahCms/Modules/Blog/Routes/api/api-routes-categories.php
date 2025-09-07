<?php
use VaahCms\Modules\Blog\Http\Controllers\Backend\CategoriesController;
/*
 * API url will be: <base-url>/public/api/blog/categories
 */
Route::group(
    [
        'prefix' => 'blog/categories',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [CategoriesController::class, 'getAssets'])
        ->name('vh.backend.blog.api.categories.assets');
    /**
     * Get List
     */
    Route::get('/', [CategoriesController::class, 'getList'])
        ->name('vh.backend.blog.api.categories.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [CategoriesController::class, 'updateList'])
        ->name('vh.backend.blog.api.categories.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [CategoriesController::class, 'deleteList'])
        ->name('vh.backend.blog.api.categories.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [CategoriesController::class, 'createItem'])
        ->name('vh.backend.blog.api.categories.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [CategoriesController::class, 'getItem'])
        ->name('vh.backend.blog.api.categories.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [CategoriesController::class, 'updateItem'])
        ->name('vh.backend.blog.api.categories.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [CategoriesController::class, 'deleteItem'])
        ->name('vh.backend.blog.api.categories.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [CategoriesController::class, 'listAction'])
        ->name('vh.backend.blog.api.categories.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [CategoriesController::class, 'itemAction'])
        ->name('vh.backend.blog.api.categories.item.action');



});
