<?php

use Illuminate\Support\Facades\Route;

use App\Livro;

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

//Route::get('/', function () {
//    $livros = Livro::all();
  //  $livros = Livro::paginate(12); 

    //    return view('admin.livros.home', compact('livros'));
//});

Route::get('/contato', function () {
    return view('contato');
});



Route::get('/', 'SinglePageController@index')->name('single.index');
Route::get('pesquisar', 'SinglePageController@pesquisar')->name('single.pesquisar');



Route::group(['middleware'=>['auth']], function(){
    
    Route::prefix('admin')->namespace('Admin')->group( function () {
        
        Route::prefix('livros')->group( function () {
        
            Route::get('/', 'LivroController@index')->name('livro.index');
            Route::get('new', 'LivroController@new')->name('livro.new');
            Route::post('store', 'LivroController@store')->name('livro.store');
            Route::get('edit/{livro}', 'LivroController@edit')->name('livro.edit');
            Route::post('edit/{livro}', 'LivroController@update')->name('livro.update');
            Route::get('delete/{livro}', 'LivroController@delete')->name('livro.delete');
            
            Route::get('/fotos/{livro}', 'LivroFotoController@index')->name('livro.foto');
            Route::post('/fotos/{livro}', 'LivroFotoController@save')->name('livro.foto.save');
            Route::get('deleteFoto/{livro}/{foto}', 'LivroFotoController@delete')->name('livro.foto.delete');
    
        });
       
        Route::prefix('exemplares')->group( function () {
            
            Route::get('/', 'ExemplarController@index')->name('exemplar.index');
            Route::get('new', 'ExemplarController@new')->name('exemplar.new');
            Route::post('store', 'ExemplarController@store')->name('exemplar.store');
            Route::get('edit/{exemplar}', 'ExemplarController@edit')->name('exemplar.edit');
            Route::post('edit/{exemplar}', 'ExemplarController@update')->name('exemplar.update');
            Route::get('delete/{exemplar}', 'ExemplarController@delete')->name('exemplar.delete');
            
            Route::get('/exemplares/{exemplar}', 'ExemplarFotoController@index')->name('exemplar.foto');
            Route::post('/exemplares/{exemplar}', 'ExemplarFotoController@save')->name('exemplar.foto.save');
            Route::get('deleteFoto/{exemplar}/{foto}', 'ExemplarFotoController@delete')->name('exemplar.foto.delete');
        });
    
    
        Route::prefix('users')->group( function () {

            Route::get('/', 'UserController@index')->name('user.index');
            Route::get('new', 'UserController@new')->name('user.new');
            Route::post('store', 'UserController@store')->name('user.store');
            Route::get('edit/{user}', 'UserController@edit')->name('user.edit');
            Route::post('edit/{user}', 'UserController@update')->name('user.update');
            Route::get('delete/{user}', 'UserController@delete')->name('user.delete');
            
        });   
    });

Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();

Route::get('login/facebook', 'SocialiteController@redirectToProvider');
Route::get('login/facebook/callback', 'SocialiteController@handleProviderCallback');

