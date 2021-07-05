<?php
use App\Http\Controllers\EchographieController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\AlimentationController;
use App\Http\Controllers\CarnetSanteController;
use App\Http\Controllers\LutteController;
use App\Http\Controllers\MisesBasController;
use App\Http\Controllers\VaccinationController; 
use App\Http\Controllers\OvinsController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\BonLivraisonController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/testhome', 'HomeController@test')->name('testhome');
Route::get('/test', 'TestController@index')->name('test');
Route::get('/about', 'TestController@about')->name('about');


Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth')->group(function(){

	Route::get('/', 'HomeController@index')->name('home');
	/*Route::resource('/categories', 'CategoriesController');*/
	/*Route::resource('/news', 'NewsController');*/
});

Route::group(['middleware'=>'auth', 'prefix' =>'admin/'], function(){
	Route::get('ovins', 'OvinsController@index')->name("ovin.index");
	Route::get('ovins/create', 'OvinsController@create' )->name("ovins.create");
	Route::post("ovins/store", 'OvinsController@store')->name("ovins.store");
	Route::get('ovins/edit/{ovins}', 'OvinsController@edit')->name('ovins.edit');
	Route::post('ovins/update/{ovins}', 'OvinsController@update')->name('ovins.update');
	Route::get('ovins/destroy/{ovins}', 'OvinsController@destroy')->name('ovins.destroy');

	


	Route::get('echographie', 'EchographieController@index')->name("echographie.index");
	Route::get('echographie/create', 'EchographieController@create' )->name("echographie.create");
	Route::post("echographie/store", 'EchographieController@store')->name("echographie.store");
	Route::get('echographie/edit/{echographie}', 'EchographieController@edit')->name('echographie.edit');
	Route::post('echographie/update/{echographie}', 'EchographieController@update')->name('echographie.update');
	Route::get('echographie/destroy/{echographie}', 'EchographieController@destroy')->name('echographie.destroy');

	Route::get('livraison/index/', 'LivraisonController@index')->name("livraison.index");
	Route::get('livraison/create/', 'LivraisonController@create' )->name("livraison.create");
	Route::post("livraison/store", 'LivraisonController@store')->name("livraison.store");
	Route::get('livraison/edit/{livraison}', 'LivraisonController@edit')->name('livraison.edit');
	Route::post('livraison/update/{livraison}', 'LivraisonController@update')->name('livraison.update');
	Route::get('livraison/destroy/{livraison}', 'LivraisonController@destroy')->name('livraison.destroy');
	Route::get('livraison', 'LivraisonController@saisie')->name("livraison.saisie");
	

	Route::get('alimentation', 'AlimentationController@index')->name("alimentation.index");
	Route::get('alimentation/create', 'AlimentationController@create' )->name("alimentation.create");
	Route::post("alimentation/store", 'AlimentationController@store')->name("alimentation.store");
	Route::get('alimentation/edit/{alimentation}', 'AlimentationController@edit')->name('alimentation.edit');
	Route::post('alimentation/update/{alimentation}', 'AlimentationController@update')->name('alimentation.update');
	Route::get('alimentation/destroy/{alimentation}', 'AlimentationController@destroy')->name('alimentation.destroy');

	Route::get('carnet_sante', 'CarnetSanteController@index')->name("carnet_sante.index");
	Route::get('carnet_sante/create', 'CarnetSanteController@create' )->name("carnet_sante.create");
	Route::post("carnet_sante/store", 'CarnetSanteController@store')->name("carnet_sante.store");
	Route::get('carnet_sante/edit/{carnet_sante}', 'CarnetSanteController@edit')->name('carnet_sante.edit');
	Route::post('carnet_sante/update/{carnet_sante}', 'CarnetSanteController@update')->name('carnet_sante.update');
	Route::get('carnet_sante/destroy/{carnet_sante}', 'CarnetSanteController@destroy')->name('carnet_sante.destroy');

	Route::get('lutte', 'LutteController@index')->name("lutte.index");
	Route::get('lutte/create', 'LutteController@create' )->name("lutte.create");
	Route::post("lutte/store", 'LutteController@store')->name("lutte.store");
	Route::get('lutte/edit/{lutte}', 'LutteController@edit')->name('lutte.edit');
	Route::post('lutte/update/{lutte}', 'LutteController@update')->name('lutte.update');
	Route::get('lutte/destroy/{lutte}', 'LutteController@destroy')->name('lutte.destroy');

	Route::get('mises_bas', 'MisesBasController@index')->name("mises_bas.index");
	Route::get('mises_bas/create', 'MisesBasController@create' )->name("mises_bas.create");
	Route::post("mises_bas/store", 'MisesBasController@store')->name("mises_bas.store");
	Route::get('mises_bas/edit/{mises_bas}', 'MisesBasController@edit')->name('mises_bas.edit');
	Route::post('mises_bas/update/{mises_bas}', 'MisesBasController@update')->name('mises_bas.update');
	Route::get('mises_bas/destroy/{mises_bas}', 'MisesBasController@destroy')->name('mises_bas.destroy');
	

	Route::get('vaccination', 'VaccinationController@index')->name("vaccination.index");
	Route::get('vaccination/create', 'VaccinationController@create' )->name("vaccination.create");
	Route::post("vaccination/store", 'VaccinationController@store')->name("vaccination.store");
	Route::get('vaccination/edit/{vaccination}', 'VaccinationController@edit')->name('vaccination.edit');
	Route::post('vaccination/update/{vaccination}', 'VaccinationController@update')->name('vaccination.update');
	Route::get('vaccination/destroy/{vaccination}', 'VaccinationController@destroy')->name('vaccination.destroy');

	Route::get('bon_livraison', 'BonLivraisonController@index')->name("bon_livraison.index");
	Route::get('bon_livraison/bon_livraison', 'BonLivraisonController@create' )->name("bon_livraison.create");
	Route::post("bon_livraison/bon_livraison", 'BonLivraisonController@store')->name("bon_livraison.store");
	Route::get('bon_livraison/edit/{bon_livraison}', 'BonLivraisonController@edit')->name('bon_livraison.edit');
	Route::post('bon_livraison/update/{bon_livraison}', 'BonLivraisonController@update')->name('bon_livraison.update');
	Route::get('bon_livraison/destroy/{bon_livraison}', 'BonLivraisonController@destroy')->name('bon_livraison.destroy');


	Route::get('/import-form',[OvinsController::class, 'importUploadForm']);
	Route::post('/import-form',[OvinsController::class, 'importForm'])->name('import.file'); 

	Route::get('/export-excel',[OvinsController::class, 'exportUploadForm']);
	Route::get('/export-excel',[OvinsController::class,'exportIntoExcel'])->name('export.file');
	Route::get('/export-csv',[OvinsController::class,'exportIntoCSV']);
	
	Route::get('/abou', [MisesBasController::class, 'abou'])->name('mises_bas.abou');
	
	Route::get('/abou', [MisesBasController::class, 'showMisebas'])->name('mises_bas.abou');

	Route::get('selection', 'MisesBasController@selection')->name("mises_bas.selection");

	Route::get('/inventaire',[OvinsController::class, 'showInventaire'])->name('ovins.inventaire'); 
	
	Route::get('/livraison/showLivraison/', [LivraisonController::class, 'showLivraison'])->name('livraison.showLivraison');
	
});



