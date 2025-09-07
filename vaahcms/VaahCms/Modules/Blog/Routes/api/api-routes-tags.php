<?php
use VaahCms\Modules\Blog\Http\Controllers\Backend\TagsController;
/*
 * API url will be: <base-url>/public/api/blog/tags
 */
Route::group(
    [
        'prefix' => 'blog/tags',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', [TagsController::class, 'getAssets'])
        ->name('vh.backend.blog.api.tags.assets');
    /**
     * Get List
     */
    Route::get('/', [TagsController::class, 'getList'])
        ->name('vh.backend.blog.api.tags.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', [TagsController::class, 'updateList'])
        ->name('vh.backend.blog.api.tags.list.update');
    /**
     * Delete List
     */
    Route::delete('/', [TagsController::class, 'deleteList'])
        ->name('vh.backend.blog.api.tags.list.delete');


    /**
     * Create Item
     */
    Route::post('/', [TagsController::class, 'createItem'])
        ->name('vh.backend.blog.api.tags.create');
    /**
     * Get Item
     */
    Route::get('/{id}', [TagsController::class, 'getItem'])
        ->name('vh.backend.blog.api.tags.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', [TagsController::class, 'updateItem'])
        ->name('vh.backend.blog.api.tags.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', [TagsController::class, 'deleteItem'])
        ->name('vh.backend.blog.api.tags.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', [TagsController::class, 'listAction'])
        ->name('vh.backend.blog.api.tags.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', [TagsController::class, 'itemAction'])
        ->name('vh.backend.blog.api.tags.item.action');



});
