<?php
use Illuminate\Support\Facades\Route;

    Route::get('/', 'ServiceController@slashRoute');

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
    Route::any('/crear-imagenes-perfil-usuario', 'ServiceController@imagenUsuario')->name('crear-imagenes-perfil-usuario');
    
    Route::post('/registrarUsuario', 'ServiceController@registrarUsuario');
    Route::get('/detalle-consumidor', 'ServiceController@registrarDetalleConsumidor');

    Route::any('/crear-datos-basicos-consumidor', 'ServiceController@crearDatosBasicosConsumidor')->name('crear-datos-basicos-consumidor');
    Route::any('/crear-ubicacion-consumidor', 'ServiceController@crearUbicacionConsumidor')->name('crear-ubicacion-consumidor');

    Route::post('/registrarEmpresa', 'ServiceController@registrarEmpresa');
    Route::get('/detalle-empresa', 'ServiceController@registrarDetalleEmpresa');

    Route::any('/crear-imagenes-perfil-empresa', 'ServiceController@crearImagenesEmpresa')->name('crear-imagenes-perfil-empresa');
    Route::any('/crear-datos-basicos-empresa', 'ServiceController@crearDatosBasicosEmpresa')->name('crear-datos-basicos-empresa');
    Route::any('/crear-ubicacion-empresa', 'ServiceController@crearUbicacionEmpresa')->name('crear-ubicacion-empresa');

//----------------------------------------------- PERFIL DEL PERFIL EMPRESA -----------------------------------------------------------//

// Perfil principal 
    Route::get('/perfil-empresa', 'empresaController@perfil');
    Route::any('/get-pedido-perfil-empresa', 'empresaController@get_pedido')->name('get-pedido-perfil-empresa');
    Route::any('/get-pedido-id-perfil-empresa', 'empresaController@get_pedido_id')->name('get-pedido-id-perfil-empresa');
    Route::any('/get-detalle-pedido-perfil-empresa', 'empresaController@get_detalle_pedido')->name('get-detalle-pedido-perfil-empresa');

    Route::any('/pedido-en-proceso', 'empresaController@pedido_en_proceso')->name('pedido-en-proceso');
    Route::any('/pedido-despachado', 'empresaController@pedido_despachado')->name('pedido-despachado');
    Route::any('/pedido-cancelado', 'empresaController@pedido_cancelado')->name('pedido-cancelado');

// Producto
    Route::get('/frm-agregar-producto', 'empresaController@frmProductoAsociado');
    Route::any('/get-producto-empresa', 'empresaController@obtenerProductos')->name('get-producto-empresa');
    Route::any('/get-producto-filtros', 'empresaController@getProductoPorFiltros')->name('get-producto-filtros');
    Route::any('/agregar-producto-empresa', 'empresaController@agregarProducto')->name('agregar-producto-empresa');

// Editar EMPRESA 
    Route::get('/editar-empresa', 'empresaController@editarEmpresa');
    

//----------------------------------------------- PERFIL DEL PERFIL CONSUMIDOR -----------------------------------------------------------//
    
// Perfil principal 
    Route::get('/perfil-consumidor', 'consumidorController@perfil');
    Route::any('/get-pedido-perfil', 'consumidorController@get_pedido')->name('get-pedido-perfil');
    Route::any('/get-pedido-id-perfil-consumidor', 'consumidorController@get_pedido_id')->name('get-pedido-id-perfil-consumidor');
    Route::any('/get-detalle-pedido-perfil', 'consumidorController@get_detalle_pedido')->name('get-detalle-pedido-perfil');
    Route::any('/pedido-cancelado-consumidor', 'consumidorController@pedido_cancelado')->name('pedido-cancelado-consumidor');

// Visual TIENDAS CERCANAS DEL PERFIL CONSUMIDOR
    Route::get('/tienda-consumidor', 'consumidorController@tienda');
// METODO Y VISUAL de TIENDA DEL PERFIL CONSUMIDOR
    Route::post('/empresa-consumidor', 'consumidorController@tiendaEmpresa');
    Route::get('/editar-consumidor', 'consumidorController@editarConsumidor');

// Servicios
    Route::any('/obtener-detalle-producto-id', 'consumidorController@get_detalle_producto_id')->name('obtener-detalle-producto-id');
    Route::any('/agregar-producto-carrito', 'consumidorController@add_producto_carrito')->name('agregar-producto-carrito');
    Route::any('/get-producto-carrito', 'consumidorController@get_producto_carrito')->name('get-producto-carrito');
    Route::any('/delete-producto-carrito', 'consumidorController@delete_producto_carrito')->name('delete-producto-carrito');
    Route::any('/insert-pedido-consumidor', 'consumidorController@insert_pedido')->name('insert-pedido-consumidor');

    Route::any('/get-productos-filtros-consumidor', 'consumidorController@get_productos_filtros_consumidor')->name('get-productos-filtros-consumidor');
    Route::any('/get-localizacion-empresa', 'consumidorController@get_localizacion_idempresa')->name('get-localizacion-empresa');
    

//------------------------------------------------ PERFIL DEL PERFIL ADMINISTRADOR -----------------------------------------------//
    Route::get('/perfil-adm', 'adminController@perfil');

    Route::get('/frm-crear-img-promocio', 'adminController@frmimgPromocion');
    Route::any('/get-img-promocion', 'adminController@obtenerImgPromocion')->name('get-img-promocion');
    

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