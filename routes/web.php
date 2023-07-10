<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Tableau-de-bord', 'HomeController@accueil')->name('accueil');

Route::get('/Compte-de-delegue/{id}', 'HomeController@gerer')->name('gerer');

Route::get('/Personnel', 'HomeController@personnel')->name('personnel');

Route::get('/Ajout-Personnel', 'HomeController@inscription')->name('inscription');

Route::get('/Gestion-role', 'HomeController@role')->name('role');

Route::get('/Gestion-Delegation', 'HomeController@delegation')->name('delegation');

Route::get('/Liste-Delegation', 'HomeController@all_delegation')->name('all_delegation');

Route::get('/Demande-conges', 'HomeController@demande_conge')->name('demande_conge');

Route::get('/Etat-congé/{id}', 'HomeController@etat_conge')->name('etat_conge');

Route::get('/Liste-des-conges', 'HomeController@liste_all_conge')->name('liste_all_conge');

Route::get('/Planning-conges', 'HomeController@Planning_conge')->name('planning_conge');

Route::get('/Demande-Salle', 'HomeController@demande_salle')->name('demande_salle');

Route::get('/Planning-Salle-de-reunion', 'HomeController@planning_salle')->name('planning_salle');

Route::get('/Demande-Vehicule', 'HomeController@demande_vehicule')->name('demande_vehicule');

Route::get('/Planning-Vehicule', 'HomeController@planning_vehicule')->name('planning_vehicule');

Route::get('/Demande-de-document', 'HomeController@demande_document')->name('demande_document');

Route::get('/Demande-Entretien', 'HomeController@demande_entretien')->name('demande_entretien');

Route::get('/Mes-documents', 'HomeController@document')->name('document');

Route::get('/Mes-documents-utiles', 'HomeController@documentpartage')->name('documentpartage');

Route::get('/Actualites', 'HomeController@actualite')->name('actualite');

Route::get('/Annuaire', 'HomeController@annuaire')->name('annuaire');

Route::get('/L-Organigramme', 'HomeController@organigramme')->name('organigramme');

Route::get('/Mon-profil', 'HomeController@profil')->name('profil');

Route::get('/Les-suggestions-des-collaborateurs', 'HomeController@suggestion')->name('suggestion');

Route::get('/Types-congés', 'HomeController@typeconge')->name('typeconge');

Route::get('/Types-salles', 'HomeController@typesalle')->name('typesalle');

Route::get('/Liste-vehicules', 'HomeController@vehicules')->name('vehicules');

Route::get('/Liste-Directions', 'HomeController@direction')->name('direction');
Route::get('/Liste-Service', 'HomeController@service')->name('service');

Route::resource('User','UserController');
Route::resource('Conge','CongeController');
Route::resource('Reunion','ReunionController');
Route::resource('Demandevehicule','DemandevehiculeController');
Route::resource('DemandeDocument','DemandedocumentController');
Route::resource('Delegation','DelegationController');
Route::resource('DemandeEntretien','DemandeEntretienController');
Route::resource('Documents','DocumentController');
Route::resource('Actualite','ActualiteController');
Route::resource('Organigramme','OrganigrammeController');
Route::resource('Suggestion','SuggestionController');
Route::resource('Typeconge','TypescongeController');
Route::resource('Typesalle','TypesalleController');
Route::resource('Direction','DirectionController');
Route::resource('Service','ServiceController');
Route::resource('Notification','NotificationController');




