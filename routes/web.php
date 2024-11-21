<?php

use App\Http\Controllers\BrowseController;
use App\Http\Controllers\LatestAdditionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/latest', [LatestAdditionsController::class, 'index'])->name('latest');

Route::get('/browse', function () {
    return view('pages.browse');
})->name('browse');

Route::get('/browse/year', function () {
    return view('pages.browseByYear');
})->name('browse.year');

Route::get('/browse/author', function () {
    return view('pages.browseByAuthor');
})->name('browse.author');

Route::get('/browse/contributor', function () {
    return view('pages.browseByContributors');
})->name('browse.contributor');

Route::get('/browse/division', function () {
    return view('pages.browseByDivision');
})->name('browse.division');

Route::get('/browse/year/data', [BrowseController::class, 'getByYear'])->name('browse.year.data');

Route::get('/browse/subject', [BrowseController::class, 'getSubjects'])->name('browse.subject');

Route::get('/api/eprints/by-subject', [BrowseController::class, 'getBySubject'])->name('browse.subject.data');

Route::get('/browse/document-type', [BrowseController::class, 'getDocumentTypes'])->name('browse.document.type');
Route::get('/api/eprints/by-document-type', [BrowseController::class, 'getByDocumentType'])->name('browse.document.type.data');

Route::get('/api/eprints/author', [BrowseController::class, 'getByAuthorName'])->name('browse.document.author');
Route::get('/api/eprints/division', [BrowseController::class, 'getByDivisons'])->name('browse.document.division');

Route::get('/browse/simple', [SearchController::class, 'simpleSearch'])->name('browse.simple');

Route::get('/search', [SearchController::class, 'advancedSearchPage'])->name('search');


Route::get('/advanced-search', [SearchController::class, 'advancedSearch'])->name('advanced-search');


Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics');

Route::get('/upload', [UploadController::class, 'index'])->name('upload.type');
Route::get('/upload/upload', [UploadController::class, 'upload'])->name('upload.upload');
Route::get('/upload/details', [UploadController::class, 'details'])->name('upload.details');
Route::get('/upload/subjects', [UploadController::class, 'subjects'])->name('upload.subjects');
Route::get('/upload/deposit', [UploadController::class, 'deposit'])->name('upload.deposit');

Route::post('storeType', [UploadController::class, 'storeType'])->name('storeType');
Route::post('storeUpload', [UploadController::class, 'storeUpload'])->name('storeUpload');
Route::post('storeSubject', [UploadController::class, 'storeSubject'])->name('storeSubject');
Route::post('storeDetails', [UploadController::class, 'storeDetails'])->name('storeDetails');
Route::post('storeEprint', [UploadController::class, 'storeEprint'])->name('storeEprint');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/file/{filename}', [BrowseController::class, 'openFile'])->name('file.open');
