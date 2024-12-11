<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Models\Project;


Route::get('/', [EventController::class, 'index']);
Route::get('/events/createProject', [EventController::class, 'createProject']);
Route::post('/events', [EventController::class, 'store']);


Route::get('/projetos', function () {
    $projects = Project::all();
    return view('projetos', ['projects' => $projects]);
})->middleware('auth');
Route::get('/projects/details/{id}', [EventController::class, 'projetoPorIdcomJson'])->name('projeto.detalhes.json');
Route::delete('/projects_teste_delete_route/{project}', [EventController::class, 'destroy'])->name('projects.destroy');

Route::get('/projetos_teste/{id}', [EventController::class, 'projetoPorId'])->name('projeto.detalhes')->middleware('auth');



Route::get('/tecnologias/{id}', [EventController::class, 'todasTecnologias'])->name('tecnologias.detalhes.json');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['projects' => Project::all()]);
    })->name('dashboard');
});
