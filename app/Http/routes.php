<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('company', 'CompanyController');
Route::group(['prefix' => 'config'], function () {
    Route::resource('account', 'AccountController');
    Route::resource('category', 'CategoryController');
    Route::resource('supplier', 'SupplierController');
    Route::resource('typeproperty', 'TypePropertyController');
    Route::resource('quota', 'QuotaController');
    Route::resource('installation', 'InstallationController');
    Route::resource('receiptnumber', 'ReceiptNumberController');

});
Route::group(['prefix' => 'properties'], function () {
    Route::resource('property', 'PropertyController');
	Route::get('/property/contact/{id?}', [
        'as' => 'properties.property.contact', 'uses' => 'PropertyController@contacts'
    ]);
	Route::resource('contact', 'ContactController');
	Route::get('/contact/list/{option?}', [
        'as' => 'properties.contact.list', 'uses' => 'ContactController@listar'
    ]);

});
Route::group(['prefix' => 'equipment'], function () {
    Route::resource('machinery', 'EquipmentController');
	Route::resource('maintenanceplan', 'MaintenancePlanController');
	Route::resource('maintenancerecord', 'MaintenanceRecordController');
	Route::get('/maintenancerecord/{id_maintenanceplan}/create', [
        'as' => 'equipment.maintenancerecord.maintenanceplan.create', 'uses' => 'MaintenanceRecordController@createbymaintenanceplan'
    ]);
});
Route::group(['prefix' => 'communication'], function () {
    Route::resource('phonesite', 'PhonesiteController');
    Route::resource('communication', 'CommunicationController');
	Route::resource('document', 'DocumentController');
    Route::get('/send/{id}', [
        'as' => 'communication.communication.send', 'uses' => 'CommunicationController@send'
    ]);
	Route::get('/resend/{id}', [
        'as' => 'communication.communication.resend', 'uses' => 'CommunicationController@resend'
    ]);
	Route::post('/send', [
        'as' => 'communication.communication.sendcommunication', 'uses' => 'CommunicationController@sendcommunication'
    ]);
	Route::get('/register/send', [
        'as' => 'communication.register.send', 'uses' => 'CommunicationController@registersend'
    ]);
    Route::get('/copy/{id}', [
        'as' => 'communication.communication.copy', 'uses' => 'CommunicationController@copy'
    ]);
	Route::post('/copy', [
        'as' => 'communication.communication.savecopy', 'uses' => 'CommunicationController@savecopy'
    ]);
	Route::get('/print/{id}', [
        'as' => 'communication.communication.print', 'uses' => 'CommunicationController@printcom'
    ]);
});

Route::group(['prefix' => 'transaction'], function () {

	Route::get('/accountsreceivable/generate', [
        'as' => 'transaction.accountsreceivable.generate', 'uses' => 'AccountsReceivableController@generate'
    ]);

	Route::post('/accountsreceivable/generate', [
        'as' => 'transaction.accountsreceivable.searchgenerate', 'uses' => 'AccountsReceivableController@searchgenerate'
    ]);

	Route::post('/accountsreceivable/storegenerate', [
        'as' => 'transaction.accountsreceivable.storegenerate', 'uses' => 'AccountsReceivableController@storegenerate'
    ]);

	Route::get('/notification/send', [
        'as' => 'transaction.notification.send', 'uses' => 'AccountsReceivableController@send'
    ]);

	Route::get('/notification/generatenotification', [
        'as' => 'transaction.notification.generatenotification', 'uses' => 'AccountsReceivableController@generatenotification'
    ]);

	Route::post('/notification/sendnotification', [
        'as' => 'transaction.notification.sendnotification', 'uses' => 'AccountsReceivableController@sendnotification'
    ]);

	Route::post('/accountsreceivable/storealertpayment', [
        'as' => 'transaction.accountsreceivable.storealertpayment', 'uses' => 'AccountsReceivableController@storealertpayment'
    ]);
	Route::get('/notification/registernotification', [
        'as' => 'transaction.notification.registernotification', 'uses' => 'AccountsReceivableController@registernotification'
    ]);
	//Buscar en index

	Route::post('/accountsreceivable/storealertpayment/search', [
        'as' => 'transaction.accountsreceivable.search', 'uses' => 'AccountsReceivableController@search'
    ]);
	Route::get('/copy/{id}', [
        'as' => 'transaction.accountsreceivable.copy', 'uses' => 'AccountsReceivableController@copy'
    ]);

	Route::get('/accountsreceivable/print/{id}', [
        'as' => 'transaction.accountsreceivable.print', 'uses' => 'AccountsReceivableController@printing'
    ]);

	Route::resource('accountsreceivable', 'AccountsReceivableController');
	//cobranzas Routes
	Route::resource('collection', 'CollectionController');

	Route::get('collection/{id}/pdf', [
        'as' => 'transaction.collection.pdf', 'uses' => 'CollectionController@pdf'
    ]);

	Route::post('collection/send', [
        'as' => 'transaction.collection.send', 'uses' => 'CollectionController@sendemail'
    ]);
	Route::post('cancel', [
        'as' => 'transaction.cancel', 'uses' => 'TransactionController@anular'
    ]);

	//Gastos Rutas

	Route::get('expense/{expense}/copy', [
        'as' => 'transaction.expense.copy', 'uses' => 'ExpensesController@copy'
    ]);
	Route::get('expense/{id}/pdf', [
        'as' => 'transaction.expense.pdf', 'uses' => 'ExpensesController@pdf'
    ]);
	Route::resource('expense', 'ExpensesController');

	//Traspasos
	Route::resource('transfer', 'TransferController');
	Route::get('transfer/{id}/pdf', [
        'as' => 'transaction.transfer.pdf', 'uses' => 'TransferController@pdf'
    ]);
	Route::post('search', [
        'as' => 'transaction.search', 'uses' => 'TransactionController@search'
    ]);
	Route::post('search', [
        'as' => 'transaction.transfer.search', 'uses' => 'TransferController@search'
    ]);


});
Route::get('admin', [
    'as' => 'admin.home', 'uses' => 'AdminController@index'
]);

Route::group(['prefix' => 'report'], function () {
	//Reportes Disonibilidad
	Route::get('disponibilidad', [
		'as' => 'report.disponibilidad', 'uses' => 'ReportDisponibilidadController@disponibilidad'
	]);
	Route::post('disponibilidad/show', [
		'as' => 'report.disponibilidad.show', 'uses' => 'ReportDisponibilidadController@disponibilidad_show'
	]);
	Route::get('disponibilidad/{fecha}/pdf', [
        'as' => 'report.disponibilidad.pdf', 'uses' => 'ReportDisponibilidadController@disponibilidadPdf'
    ]);
	Route::get('disponibilidad/{fecha}/excel', [
        'as' => 'report.disponibilidad.excel', 'uses' => 'ReportDisponibilidadController@disponibilidadExcel'
    ]);
	//Reporte Estado de Resultados
	Route::get('estadoresultados', [
		'as' => 'report.estadoresultados', 'uses' => 'ReportEstadoActualController@estadoresultados'
	]);
	Route::post('estadoresultados/show', [
		'as' => 'report.estadoresultados.show', 'uses' => 'ReportEstadoActualController@estadoresultados_show'
	]);
	Route::get('estadoresultados/{opcion}/excel', [
        'as' => 'report.estadoresultados.excel', 'uses' => 'ReportEstadoActualController@estadoresultadosExcel'
    ]);
	//Reporte Categoria por periodo y gestion
	Route::get('categoriaperiodogestion', [
		'as' => 'report.reportcategoriaperiodogestion', 'uses' => 'ReportCategoriaPeriodoGestionController@categoriaperiodogestion'
	]);
	Route::post('categoriaperiodogestion/show', [
		'as' => 'report.categoriaperiodogestion.show', 'uses' => 'ReportCategoriaPeriodoGestionController@categoriaperiodogestion_show'
	]);
	Route::get('categoriaperiodogestion/{gestion}/excel', [
        'as' => 'report.categoriaperiodogestion.excel', 'uses' => 'ReportCategoriaPeriodoGestionController@categoriaperiodogestion_excel'
    ]);
	//Reporte Cuentas por Cobrar
	Route::get('cuentascobrar', [
		'as' => 'report.cuentascobrar', 'uses' => 'ReportCuentasCobrarController@cuentascobrar'
	]);
	
	Route::post('cuentascobrar/show', [
		'as' => 'report.cuentascobrar.show', 'uses' => 'ReportCuentasCobrarController@cuentascobrar_show'
	]);
	Route::get('cuentascobrar/detallado/{opcion}/excel', [
        'as' => 'report.detallado.categoriaperiodogestion.excel', 'uses' => 'ReportCuentasCobrarController@categoriaperiodogestion_detallado_excel'
    ]);
	Route::get('cuentascobrar/consolidado/{opcion}/excel', [
        'as' => 'report.consolidado.categoriaperiodogestion.excel', 'uses' => 'ReportCuentasCobrarController@categoriaperiodogestion_consolidado_excel'
    ]);
	Route::get('cuentascobrar/porpropiedad/{opcion}/excel', [
        'as' => 'report.porpropiedad.categoriaperiodogestion.excel', 'uses' => 'ReportCuentasCobrarController@categoriaperiodogestion_porpropiedad_excel'
    ]);
	
	//Reporte Historico transacciones
	Route::get('historicotransacciones', [
		'as' => 'report.historicotransacciones', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones'
	]);
	Route::post('historicotransacciones/show', [
		'as' => 'report.historicotransacciones.show', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_show'
	]);
	Route::get('historicotransacciones/cuentas/{opcion}/excel', [
        'as' => 'report.historicotransacciones.cuentas.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_cuentas_excel'
    ]);
	
	Route::get('historicotransacciones/categorias/{opcion}/excel', [
        'as' => 'report.historicotransacciones.categorias.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_categorias_excel'
    ]);
	
	Route::get('historicotransacciones/proveedores/{opcion}/excel', [
        'as' => 'report.historicotransacciones.proveedores.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_proveedores_excel'
    ]);
	
	Route::get('historicotransacciones/propiedades/{opcion}/excel', [
        'as' => 'report.historicotransacciones.propiedades.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_propiedades_excel'
    ]);

	Route::get('historicotransacciones/ingresos/{opcion}/excel', [
        'as' => 'report.historicotransacciones.ingresos.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_ingresos_excel'
    ]);
	
	Route::get('historicotransacciones/egresos/{opcion}/excel', [
        'as' => 'report.historicotransacciones.egresos.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_egresos_excel'
    ]);
	
	Route::get('historicotransacciones/traspasos/{opcion}/excel', [
        'as' => 'report.historicotransacciones.traspasos.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_traspasos_excel'
    ]);
	
	Route::get('historicotransacciones/transacciones/{opcion}/excel', [
        'as' => 'report.historicotransacciones.transacciones.excel', 'uses' => 'ReportHistoricoTransaccionesController@historicotransacciones_transacciones_excel'
    ]);
	
	//Reporte Estado de cobranzas 
	Route::get('estadocobranzas', [
		'as' => 'report.estadocobranzas', 'uses' => 'ReportEstadoCobranzasController@estadocobranzas'
	]);
	Route::post('estadocobranzas/show', [
		'as' => 'report.estadocobranzas.show', 'uses' => 'ReportEstadoCobranzasController@estadocobranzas_show'
	]);
	Route::get('estadocobranzas/{opcion}/excel', [
        'as' => 'report.estadocobranzas.excel', 'uses' => 'ReportEstadoCobranzasController@estadocobranzasExcel'
    ]);
	//Reporte Estado de pagos
	Route::get('estadopagos', [
		'as' => 'report.estadopagos', 'uses' => 'ReportEstadoPagosController@estadopagos'
	]);
	Route::post('estadopagos/show', [
		'as' => 'report.estadopagos.show', 'uses' => 'ReportEstadoPagosController@estadopagos_show'
	]);
});
//Rutas de Tareas
Route::group(['prefix' => 'taskrequest'], function () {
    Route::resource('task', 'TaskController');
	Route::get('/copy/{id}', [
        'as' => 'taskrequest.task.copy', 'uses' => 'TaskController@copy'
    ]);
	Route::post('/task/search', [
        'as' => 'taskrequest.task.search', 'uses' => 'TaskController@search'
    ]);
	//seguimiento de tareas
	Route::get('/tasktracking', [
        'as' => 'taskrequest.tasktracking.index', 'uses' => 'TaskTrackingController@index'
    ]);
	Route::get('/tasktracking/create/{id_task}', [
        'as' => 'taskrequest.tasktracking.create', 'uses' => 'TaskTrackingController@create'
    ]);
	Route::get('/tasktracking/create/{id_task}/{id_tasktracking}', [
        'as' => 'taskrequest.tasktracking.edit', 'uses' => 'TaskTrackingController@edit'
    ]);
	Route::post('/tasktracking/store', [
        'as' => 'taskrequest.tasktracking.store', 'uses' => 'TaskTrackingController@store'
    ]);
	Route::post('/tasktracking/update/{id}', [
        'as' => 'taskrequest.tasktracking.update', 'uses' => 'TaskTrackingController@update'
    ]);
	Route::post('/tasktracking/destroy/{id}', [
        'as' => 'taskrequest.tasktracking.destroy', 'uses' => 'TaskTrackingController@destroy'
    ]);
	
	//Reclamos y reservacion 
	Route::get('/reservation', [
        'as' => 'taskrequest.reservation.index', 'uses' => 'TaskController@reservation'
    ]);
	Route::get('/suggestion', [
        'as' => 'taskrequest.suggestion.index', 'uses' => 'TaskController@suggestion'
    ]);

});
/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('tvservices', 'Support\TvserviceController');
	Route::resource('situacionHabitacional', 'Support\SituacionHabitacionalController');
	Route::resource('phoneservices', 'Support\PhoneServiceController');
	Route::resource('internetservices', 'Support\InternetserviceController');
	Route::resource('waterservices', 'Support\WaterserviceController');
	Route::resource('electricservices', 'Support\ElectricserviceController');
	Route::resource('typecontacts', 'Support\TypecontactController');
	Route::resource('relationcontacts', 'Support\RelationcontactController');
	Route::resource('media', 'Support\MediaController');
});

//AJAX
Route::post('contact/{property_id}/property', 'ContactController@contactbyproperty');
Route::post('accountsreceivable/{property_id}/property', 'AccountsReceivableController@accountsreceivablebyproperty');

Route::post('expenses/{category_id}/category', 'ExpensesController@expensesbycategory');
