<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::controller('home', 'ManagerReportController');

Route::get('/home', 'ManagerReportController@showHome');

Route::get('/sort/{property}/{key}', 'ManagerReportController@showSort');

Route::get('/edit/{id}', 'ManagerReportController@showEdit');

Route::get('/finish/{id}', 'ManagerReportController@finishReport');

Route::controller('/test', 'HomeController');

//---------------- edit controller ------------------

Route::controller('edit', 'EditController');

Route::post('edit-javi', 'EditController@editJavi');

Route::post('edit-vija', 'EditController@editVija');

Route::post('edit-kanji', 'EditController@editKanji');

Route::post('edit-grammar', 'EditController@editGrammar');

//---------------- history controller ---------------

Route::controller('history', 'HistoryReportController');

Route::get('history-kanji', 'HistoryReportController@showHistoryKanji');

Route::get('history-grammar', 'HistoryReportController@showHistoryGrammar');

Route::get('history-vija', 'HistoryReportController@showHistoryVija');

Route::get('history-javi', 'HistoryReportController@showHistoryJavi');

Route::get('history-kanji/{id}', 'HistoryReportController@showDetailHistoryKanji');

Route::get('history-grammar/{id}', 'HistoryReportController@showDetailHistoryGrammar');

Route::get('history-vija/{id}', 'HistoryReportController@showDetailHistoryVija');

Route::get('history-javi/{id}', 'HistoryReportController@showDetailHistoryJavi');

Route::get('history-undo-javi/{id}', 'HistoryReportController@undoHistoryJavi');

Route::get('history-undo-kanji/{id}', 'HistoryReportController@undoHistoryKanji');

Route::get('history-undo-vija/{id}', 'HistoryReportController@undoHistoryVija');

Route::get('history-undo-grammar/{id}', 'HistoryReportController@undoHistoryGrammar');



// --------------- sqlite controller -------------------

Route::controller('sqlite', 'SqliteDatabaseController');

Route::get('export', 'SqliteDatabaseController@showExport');

Route::get('export-kanji', 'SqliteDatabaseController@downloadKanij');

Route::get('export-grammar', 'SqliteDatabaseController@downloadGrammar');

Route::get('export-javi', 'SqliteDatabaseController@downloadJavi');

Route::get('export-vija', 'SqliteDatabaseController@downloadVija');

Route::get('export-all', 'SqliteDatabaseController@downloadDatabaseSqlite');


// --------------- acount controller -------------------

Route::controller('acount', 'AcountController');

Route::get('login', 'AcountController@showLogin');

Route::post('login', "AcountController@actionLogin");

Route::get('logout', "AcountController@actionLogout");


// ---------------- manager user controller ----------

Route::controller('manager-user', 'ManagerAcountController');

Route::get('list-user', 'ManagerAcountController@showListUser');

Route::get('delete-user/{id}', 'ManagerAcountController@deleteUser');

Route::post('add-user', 'ManagerAcountController@addUser');

//

Route::controller('mynote', 'ManagerMyNoteController');

Route::get('list-note', 'ManagerReportController@get_list_mynote');