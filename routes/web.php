<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ForgetPasswordController;
use App\Mail\ContactMessageCreated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|   Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

//Genération de la page d'accueil
Route::get('/', [Controller::class, 'showPageAccueil'])->name('PageAccueil.show');

//Genération de la page d'itablissement
Route::get('/itablissement', [Controller::class, 'showItablissement'])->name('itablissement.show');

//Genération de la page de contact
Route::get('/contact', [Controller::class, 'showContact'])->name('contact.show');

//Genération de La page principale Etudiant
Route::get('/etudiant', [Controller::class, 'showConnexionEtudiant'])->name('connexionEtudiant.show');

//Géneration de La page d’inscription Etudiant
Route::get('/etudiant/inscription', [Controller::class, 'showInscriptionEtudiant'])->name('InscriptionEtudiant.show');
Route::post('/inscription', [Controller::class, 'storeInscription'])->name('Inscription.store');

//Générartion de la page d’identification ou authentification pour etudiant
Route::get('/etudiant/loginEtudiant', [Controller::class, 'showLoginEtudiant'])->name('LogineEtudiant.show');
Route::post('/loginEtudiant', [Controller::class, 'storeLoginEtudiant'])->name('LoginEtudiant.post');




//Générartion de la page d’identification ou authentification pour enseignant
Route::get('/enseignant/loginEnseignant', [Controller::class, 'showLoginEnseignant'])->name('LogineEnseignant.show');
Route::post('/loginEnseignant', [Controller::class, 'storeLoginEnseignant'])->name('LoginEnseignant.store');

//déconexion enseignant
Route::post('/logout', [Controller::class, 'logout'])->name('logout');



//Mot de passe au cas d'oublie
Route::get('/mot-de-passe-oublie', [Controller::class, 'motDePasseOublieForm'])->name('motDePasseOublie');
Route::post('/mot-de-passe-oublie', [Controller::class, 'storemotDePasseOublie'])->name('motDePasseOublie.post');

//réinitialisation du mot de passe
Route::get('/reinitialisation-mot-de-passe', [Controller::class, 'reinitialisationMotDePasseForm'])->name('reinitialisationMotDePasse');
Route::post('/reinitialisation-mot-de-passe', [Controller::class, 'storereinitialisationMotDePasse'])->name('reinitialisationMotDePasse.post');

//Générartion du tableau de bord etudiant
//Route::get('/etudiant/tableau_de_bord_etudiant', [Controller::class, 'showTableauDeBordEtudiant'])->name('tableauDeBordEtudiant.show');

//Générartion du tableau de bord enseignant
//Route::get('/enseignant/tableau-de-Bord-enseignant', [Controller::class, 'showTableauDeBordEnseignant'])->name('tableauDeBordEnseignant.show');

//Géneration de la page profil
Route::get('/etudiant/profil', [Controller::class, 'showProfil'])->name('profil.show');

//Modification des informations de l'étudiant
Route::get('/etudiant/profil/modification', [Controller::class, 'modificationEtudiantForm'])->name('modificationEtudiant');
Route::post('/modificationEtudiant', [Controller::class, 'storeModificationEtudiant'])->name('modificationEtudiant.post');

//Géneration de la page mes rendez vous
Route::get('/etudiant/mes-rendez-vous', [Controller::class, 'showMesRendezVousEtudiant'])->name('MesRendezVousEtudiant');
Route::get('/etudiant/mes-rendez-vous/checher', [Controller::class, 'showSearchBarre'])->name('barre.reserch');

//Géneration de la page de la prise de rendez vous
Route::get('/etudiant/prise-rendez-vous', [Controller::class, 'priseRendezVousForm'])->name('priseRendezVous');
Route::post('/prise-rendez-vous', [Controller::class, 'storePriseRendezVous'])->name('priseRendezVous.post');
Route::post('/annulationRendezVous', [Controller::class, 'storeannulationRendezVous'])->name('annulationRendezVous.post');
Route::get('/etudiant/message-reçu', [Controller::class, 'showMessageReçu'])->name('messageRecu.show');
Route::get('/etudiant/message-reçu-msg', [Controller::class, 'showMessageReçu_msg'])->name('messageRecu_msg.show');



//Géneration de la page des rdv avec les etudiant et envoi de message
Route::get('/enseignant/mes-rendez-vous', [Controller::class, 'rendezVousMessageForm'])->name('rendezVousMessage');
Route::get('/enseignant/mes-rendez-vous/checher', [Controller::class, 'showSearchBarre2'])->name('barre2.reserch');

Route::get('/enseignant/message-enseignant-etudiant', [Controller::class, 'RendezVousMessage'])->name('message-enseignant-etudiant');
Route::post('/message-enseignant-etudiant', [Controller::class, 'storeRendezVousMessage'])->name('message-enseignant-etudiant.post');
Route::post('/annulationRendezVousEnseignant', [Controller::class, 'storeannulationRendezVousEnseignant'])->name('annulationRendezVousEnseignant.post');
Route::get('/enseignant/rendez-vous', [Controller::class, 'RendezVous'])->name('RDV-enseignant-etudiant');

//Géneration de la page disponibilité enseignant
Route::get('/enseignant/disponibilites', [Controller::class, 'showdisponibilites'])->name('disponibilites.show');
Route::post('/disponibilites', [Controller::class, 'storeDisponibilites'])->name('diponibilites.post');


//Route::get('/enseignant/disponibilites', [Controller::class, 'showdisponibilites'])->name('disponibilites.show');

//changement de photo
Route::post('/xx', [Controller::class, 'storePhoto'])->name('photo.post');

Route::get('/test-email',function(){
    return new ContactMessageCreated('BELKHOUS','lyes.belkhous@hotmail.com','reinitialisation de mot de passe');
});

//chargement d'un fichier
Route::get('/chargementFichier', [Controller::class, 'chargementFichier'])->name('chargerFichier');

