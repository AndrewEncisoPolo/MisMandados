<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect('inicio');});

// TIENDA CONTROLLER 
Route::get('/tienda', 'tiendaController@init');

// INICIO CONTROLLER
Route::get('/inicio', 'inicioController@init');

// CONTACTO CONTROLLER
Route::get('/contacto', 'contactoController@init');

//Visual DE ERROR
Route::get('/error', 'ServiceController@error');


//SERVICE CONTROLLER 
    Route::post('/login', 'ServiceController@login');
    Route::post('/logout', 'ServiceController@logout');
    
// Restablecer Contraseña
    Route::get('/restablecer-contrasenna', 'ServiceController@recuperarContrasenna');
    Route::any('/validar-usuario-rc', 'ServiceController@verificarUsuario_rc')->name('validar-usuario-rc');
    Route::any('/obtener-nueva-contrasenna', 'ServiceController@recuperarContrasenna_rc')->name('obtener-nueva-contrasenna');

Route::any('/obtener-producto-id', 'ServiceController@get_producto_id')->name('obtener-producto-id');


Route::post('/registrarEmpresa', 'ServiceController@registrarEmpresa');


Route::post('/registrarUsuario', 'ServiceController@registrarUsuario');
Route::get('/detalle-consumidor', 'ServiceController@registrarDetalleConsumidor');
Route::any('/crear-datos-basicos-consumidor', 'ServiceController@crearDatosBasicosConsumidor')->name('crear-datos-basicos-consumidor');
Route::any('/crear-ubicacion-consumidor', 'ServiceController@crearUbicacionConsumidor')->name('crear-ubicacion-consumidor');



//----------------------------------------------- PERFIL DEL PERFIL CONSUMIDOR -----------------------------------------------------------//
    
// Perfil principal 
    Route::get('/perfil-consumidor', 'consumidorController@perfil');
// Visual TIENDAS CERCANAS DEL PERFIL CONSUMIDOR
    Route::get('/tienda-consumidor', 'consumidorController@tienda');
// METODO Y VISUAL de TIENDA DEL PERFIL CONSUMIDOR
    Route::post('/empresa-consumidor', 'consumidorController@tiendaEmpresa');

// Servicios
    Route::any('/obtener-detalle-producto-id', 'consumidorController@get_detalle_producto_id')->name('obtener-detalle-producto-id');
    Route::any('/agregar-producto-carrito', 'consumidorController@add_producto_carrito')->name('agregar-producto-carrito');




//------------------------------------------------ PERFIL DEL PERFIL ADMINISTRADOR -----------------------------------------------//
    Route::get('/perfil-adm', 'adminController@perfil');


// CLIENTE
    // TIPO COMERCIO
        Route::get('/frm-crear-tipocomercio', 'adminController@frmcreartipocomercio');
        Route::any('/get-tipocomercios', 'adminController@obtenerTipoComercios')->name('get-tipocomercios');
        Route::any('/crear-tipocomercio', 'adminController@crearTipocomercio')->name('crear-tipocomercio');
// CLIENTE


// PRODUCTO 
    // PRODUCTO
        Route::get('/frm-crear-producto', 'adminController@frmCrearProducto');

        Route::any('/crear-producto', 'adminController@crearProducto')->name('crear-producto');

    // MARCA
        Route::get('/frm-crear-marca', 'adminController@frmcrearmarca');
        Route::any('/get-marcas', 'adminController@obtenerMarcas')->name('get-marcas');
        Route::any('/crear-marca', 'adminController@crearMarca')->name('crear-marca');

    // CATEGORIA
        Route::get('/frm-crear-categoria', 'adminController@frmcrearcategoria');
        Route::any('/get-categorias', 'adminController@obtenerCategorias')->name('get-categorias');
        Route::any('/crear-categoria', 'adminController@crearCategoria')->name('crear-categoria');

    // UNIDAD MEDIDA    
        Route::get('/frm-crear-unidadmedida', 'adminController@frmcrearunidadmedida');
        Route::any('/get-unidadmedida', 'adminController@obtenerUnidadMedida')->name('get-unidadmedida');
        Route::any('/crear-unidadmedida', 'adminController@crearUnidadmedida')->name('crear-unidadmedida');
// PRODUCTO


// ZONA
    //Departamento
        Route::get('/frm-crear-departamento', 'adminController@frmcreardepartamento');
        Route::any('/get-departamentos', 'adminController@obtenerDepartamentos')->name('get-departamentos');
        Route::any('/crear-departamento', 'adminController@crearDepartamento')->name('crear-departamento');

    //Ciudad
        Route::get('/frm-crear-ciudad', 'adminController@frmcrearciudad');
        Route::any('/get-ciudades', 'adminController@obtenerCiudades')->name('get-ciudades');
        Route::any('/crear-ciudad', 'adminController@crearCiudad')->name('crear-ciudad');

    //Localidad
        Route::get('/frm-crear-localidad', 'adminController@frmcrearlocalidad');
        Route::any('/get-localidades', 'adminController@obtenerLocalidades')->name('get-localidades');
        Route::any('/crear-localidad', 'adminController@crearLocalidad')->name('crear-localidad');

    //Barrio
        Route::get('/frm-crear-barrio', 'adminController@frmcrearbarrio');
        Route::any('/get-barrios', 'adminController@obtenerBarrios')->name('get-barrios');
        Route::any('/crear-barrio', 'adminController@crearBarrio')->name('crear-barrio');

    //Zona por ID
        Route::any('/get-ciudad-iddepartamento', 'adminController@obtenerCiudadIdDepartamento')->name('get-ciudad-iddepartamento');
        Route::any('/get-localidad-idciudad', 'adminController@obtenerLocalidadIdCiudad')->name('get-localidad-idciudad');
        Route::any('/get-barrio-idlocalidad', 'adminController@obtenerbarrioIdLocalidad')->name('get-barrio-idlocalidad');
// ZONA 

