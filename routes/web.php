<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoPeriodoController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EstadoMatriculaController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoOfrecidoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ProfesorDirectorController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\AnotacionController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ReunionApoderadoController;
use App\Http\Controllers\RegistrosdeClaseController;
use App\Http\Controllers\ProfesorClaseController;
use App\Http\Controllers\MallaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\InformeNotasController;
use App\Http\Controllers\ListarCursoController;
Use App\Http\Controllers\RendimientoController;

Auth::routes();
Auth::routes(['reset' => true]);

//reestablecer contraseñas
Route::get('/password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change.form')->middleware('auth');;
Route::post('/password/change', [PasswordController::class, 'changePassword'])->name('password.change')->middleware('auth');;
Route::get('/password/change', [PasswordController::class, 'showChangePasswordForm'])->name('password.change.form')->middleware('auth');;
Route::post('/password/change', [PasswordController::class, 'changePassword'])->name('password.change')->middleware('auth');;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/contacto', function () {
    return view('contacto'); // Aquí va la vista que quieres mostrar
})->name('contacto');



Route::middleware(['auth'])->group(function () {
        
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::resource('estado-periodos', EstadoPeriodoController::class);
    Route::resource('periodos', PeriodoController::class);
    Route::resource('alumnos', AlumnoController::class)->middleware('auth');
    Route::resource('apoderados', ApoderadoController::class);
    Route::get('apoderados/curso/{cursoId}', [ApoderadoController::class, 'getApoderadosByCurso']);
    Route::resource('cursos', CursoController::class);
    Route::resource('estado-matriculas', EstadoMatriculaController::class);
    Route::resource('asignaturas', AsignaturaController::class);
    Route::resource('curso-ofrecidos', CursoOfrecidoController::class);
    Route::resource('evaluacions', EvaluacionController::class);
    Route::resource('asistencias', AsistenciaController::class);
    Route::resource('profesor-directors', ProfesorDirectorController::class);
    Route::resource('reunions', ReunionController::class);
    Route::resource('anotacions', AnotacionController::class);
    Route::resource('matriculas', MatriculaController::class);

    Route::resource('reunion-apoderados', ReunionApoderadoController::class);
    Route::get('reunion-apoderados/apoderados/curso/{cursoId}', [ReunionApoderadoController::class, 'getApoderadosByCurso']);
    Route::resource('registrosde-clases', RegistrosdeClaseController::class);
    Route::resource('profesor-clases', ProfesorClaseController::class);
    Route::resource('mallas', MallaController::class);


    Route::get('/listacurso', [ListarCursoController::class, 'index']);

    Route::post('/rendimiento/consultar', [RendimientoController::class, 'consultarNotas'])->name('rendimiento.consultar');

    Route::get('/rendimiento', [RendimientoController::class, 'index'])->name('rendimiento.index');
    Route::post('/rendimiento/notas', [RendimientoController::class, 'consultarNotas'])->name('rendimiento.notas');

    Route::get('/informenotas', [InformeNotasController::class, 'generarInforme'])->name('informe-notas');

    //exportar notas
    Route::get('informe/notas-pdf', [InformeNotasController::class, 'verPDF'])->name('informe-notas.ver-pdf');
    

});

// //ruta temporales

// Route::view('/calificaciones', 'vistatemp.calificaciones');
// Route::view('/registroR', 'vistatemp.registroR');
// Route::view('/clasescursos', 'vistatemp.clasescursos');
// Route::view('/asistenciacurso', 'vistatemp.asistenciacurso');
// Route::view('/anotacionesalumnos', 'vistatemp.anotacionesalumnos');
// Route::view('/datosalumnosmatriculados', 'vistatemp.datosalumnosmatriculados');
// Route::view('/vroles', 'vistatemp.vroles');
// Route::view('/reportesD', 'vistatemp.reportesD');
// Route::view('/regisasistencias', 'vistatemp.regisasistencias');
// Route::view('/visnotas', 'vistatemp.visnotas');
// Route::view('/notis', 'vistatemp.notis');







//Route::get('/prueba-vista', function () {
//    return view('detalles.detailMatriculas', ['matriculas' => App\Models\Matricula::with(['alumno', 'apoderado', 'estadoMatricula'])->get()]);
//});








