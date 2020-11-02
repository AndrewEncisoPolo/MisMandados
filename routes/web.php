<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {return redirect('inicio');});

//Visual Tienda 
Route::get('/tienda', 'tiendaController@init');
//Visual Inicio
Route::get('/inicio', 'inicioController@init');
//Visual Contacto
Route::get('/contacto', 'contactoController@init');
//Visual Reestablecer Contraseña
Route::get('/restablecer-contrasenna', 'ServiceController@recuperarContrasenna');


//Metodo POST para LOGIN 
Route::post('/login', 'perfilPrincipalController@login');
//Metodo POST para LOGOUT 
Route::post('/logout', 'perfilPrincipalController@logout');
//Metodo POST para registrar una USUARIO 
Route::post('/registrarUsuario', 'ServiceController@registrarUsuario');
//Metodo POST para registrar una EMPRESA
Route::post('/registrarEmpresa', 'ServiceController@registrarEmpresa');
Route::post('/recuperarContrasennaRequest', 'ServiceController@recuperarContrasennaRequest');


//Visual PERFIL DEL PERFIL CONSUMIDOR
Route::get('/perfil-consumidor', 'perfilPrincipalController@perfilConsumidor');
//Visual TIENDAS CERCANAS DEL PERFIL CONSUMIDOR
Route::get('/tienda-consumidor', 'perfilPrincipalController@tiendaConsumidor');
//METODO Y VISUAL de TIENDA DEL PERFIL CONSUMIDOR
Route::post('/tiendaempresa-consumidor', 'perfilPrincipalController@tiendaEmpresaConsumidor');


//Visual PERFIL DEL PERFIL ADMINISTRADOR
Route::get('/perfil-adm', 'perfilPrincipalController@perfilAdm');
Route::get('/frm-crear-producto', 'perfilPrincipalController@frmCrearProducto');

Route::any('/crear-producto', 'perfilPrincipalController@crearProducto')->name('crear-producto');
Route::any('/obtener-producto-id', 'perfilPrincipalController@get_detalle_producto')->name('obtener-producto-id');

//Visual DE ERROR
Route::get('/error', 'ServiceController@error');