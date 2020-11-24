<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->name('dashboard');

Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
Route::get('job/{job}', [JobController::class, 'show'])->name('job.show');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/confirmProposal/{proposal}', [ProposalController::class, 'confirm'])->name('proposal.confirm');
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversation.index');
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'proposal']], function () {
    Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposal.store');
});
