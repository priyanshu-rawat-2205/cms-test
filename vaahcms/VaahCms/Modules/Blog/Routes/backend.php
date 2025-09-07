<?php
use VaahCms\Modules\Blog\Http\Controllers\Backend\BackendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix'     => 'backend/blog',
        'middleware' => ['web', 'has.backend.access']
    ],
    function () {
        //------------------------------------------------
        Route::get( '/', [BackendController::class, 'index'] )
            ->name( 'vh.backend.blog' );
        //------------------------------------------------
        //------------------------------------------------
        Route::get( '/assets', [BackendController::class, 'getAssets'] )
            ->name( 'vh.backend.blog.assets' );
        //------------------------------------------------
    });


/*
 * Include CRUD Routes
 */
include('backend/routes-blogs.php');
include('backend/routes-categories.php');
include('backend/routes-tags.php');
//include("backend/routes-example.php");
