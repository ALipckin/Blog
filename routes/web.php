<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Main'], function(){
    Route::get('/','IndexController')->name('main.index');
});
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function(){
    Route::get('/','IndexController')->name('post.index');
    Route::get('/{post}','ShowController')->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function(){
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function(){
        Route::post('/', 'StoreController')->name('post.like.store');
    });
});
Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
    Route::get('/','IndexController')->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function(){
        Route::get('/', 'IndexController')->name('category.post.index');
    });
});
Route::group(['namespace'=> 'Personal', 'prefix'=>'personal', 'middleware' => ['auth', 'verified']], function(){
    Route::group(['namespace'=> 'Comment', 'prefix' => 'comments'], function(){
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');

    });
    Route::group(['namespace'=> 'Main'], function(){
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace'=> 'Liked', 'prefix' => 'liked'], function(){
        Route::get('/', 'IndexController')->name('personal.liked.index');
    });
});

Route::group(['namespace'=> 'Admin', 'prefix'=>'admin', 'middleware' => ['auth', 'admin', 'verified']], function(){
    Route::group(['namespace'=> 'Main'], function(){
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function(){
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::put('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'StoreController')->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix'=>'category'], function(){
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'StoreController')->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function(){
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'StoreController')->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'StoreController')->name('admin.user.delete');
    });
});

Auth::routes(['verify' => true]);
