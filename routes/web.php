<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BuscadoreController;
use App\Http\Controllers\DjmblogController;
use App\Http\Controllers\EnlacesCategorias;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchenController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ToursenController;
use App\Http\Controllers\UserControler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Oferta
Route::get('viagem-ao-Peru-e-Machu-Picchu', [EnlacesCategorias::class, 'landing'])->name('landing');
Route::post('/enviar-formulario', [MailController::class, 'enviarFormulario'])->name('enviar.formulario');
// Categorias 
Route::get('pacotes-peru', [EnlacesCategorias::class, 'peru'])->name('peru');
Route::get('machu-picchu', [EnlacesCategorias::class, 'machu'])->name('mapi');
Route::get('trilha-inca', [EnlacesCategorias::class, 'trilhas'])->name('trilhas');
Route::get('rotas-alternativas', [EnlacesCategorias::class, 'alternativas'])->name('alternativas');

Route::get('quem-somos', [EnlacesCategorias::class, 'nosotros'])->name('nosotros');
Route::get('contato',[EnlacesCategorias::class, 'contato'])->name('contato');
Route::get('preguntas-frequentes',[EnlacesCategorias::class, 'faq'])->name('faq');
Route::get('condicoes-gerais',[EnlacesCategorias::class, 'condicoes'])->name('condicoes');
Route::get('pagamentos',[EnlacesCategorias::class, 'pagamentos'])->name('pagamentos');

Route::get('pacotes-de-viagem-no-peru', [EnlacesCategorias::class, 'pacotes'])->name('pacotes');

//blogs
Route::get('blog',[DjmblogController::class, 'djmblogs'])->name('blog');
Route::get('blog/{slug}', [DjmblogController::class, 'mostrar'])->name('muestrame');
Route::get('tag/{slug}', [BuscadoreController::class, 'show'])->name('tag');

// Mensajes
Route::post('mensajeNc', [MailController::class, 'getMail'])->name('mensaje');
Route::post('mensajeNcTravel', [MailController::class, 'getMail2'])->name('mensaje2');

// Páginas de inicio
Route::get('/', [TourController::class, 'mostrar'])->name('index');
Route::get('/nikonctravel', [HomeController::class, 'index'])->name('home');
Route::get('inicio', [TourController::class, 'mostrar'])->name('inicio');

//Reportes
Route::resource('reportes', ReporteController::class)->middleware('auth')->names('reportes');
Route::get('reporte/{id}/pdf', [ReporteController::class, 'downloadPdf'])->name('reporte.pdf');
Route::get('reporte/{id}', [ReporteController::class, 'show'])->name('reporte');

Route::post('enviar-correo/{id}', [ReporteController::class, 'enviarCorreo'])->name('enviar.correo');

// Usuarios
Route::resource('users', UserControler::class)->middleware('auth');
Route::post('upload_image', [ArticleController::class, 'uploadImage'])->name('upload');
Auth::routes();

// Crud de imagenes
Route::resource('imagenes', ImagenesController::class)->middleware('auth');
Route::resource('categoriasDjm', BuscadoreController::class)->names('cat');
Route::resource('blogsDjm', DjmblogController::class)->names('djm');


// Administrador de tour español
Route::resource('tours', TourController::class)->middleware('auth');
Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('blogsearch', [SearchController::class, 'blogsearch'])->name('blogsearch');
Route::get('/{slug}/', [TourController::class, 'show'])->name('tours.show');


// Administrador de tour Ingles
Route::resource('toursen', ToursenController::class)->middleware('auth');
Route::get('/toursen/{id}/{slug}/', [ToursenController::class, 'show'])->name('toursen.show');
Route::get('searchen', [SearchenController::class, 'search'])->name('searchen');





