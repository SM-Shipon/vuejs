<?php

/*---------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//
//Route::get('/gg', function () {
//    //return view('welcome');
//});



//vueJs basic controller
Route::get('vue-basic/hello-world','VueJsController@index');
Route::get('vue-basic/data-binding','VueJsController@data_binding');
Route::get('vue-basic/attr-class-binding','VueJsController@attr_class_binding');
Route::get('vue-basic/list-rendering','VueJsController@list_render');
Route::get('vue-basic/event-method','VueJsController@event_method');
Route::get('vue-basic/computed-properties','VueJsController@computed_properties');
Route::get('vue-basic/filter','VueJsController@filter');
Route::get('vue-basic/component','VueJsController@component');
Route::get('vue-basic/dynamic-component','VueJsController@dynamic_component');
Route::get('vue-basic/animation','VueJsController@animation');
Route::get('vue-basic/vue-router','VueJsController@vue_router');
Route::get('vue-basic/watcher','VueJsController@watcher');
Route::get('vue-basic/stater-page','VueJsController@stater_page');


// Advance vueJs route
Route::get('advance-vue/e-commerce','VueJsController@e_commerce');

//Dashboard controller
Route::get('/','DashboardController@index');
Route::get('vue-basic/blank-page','DashboardController@blank_page');
Route::get('/{anypath}','DashboardController@index')->where('path','*');

//FormsController controller
Route::get('form/general','Pike\FormsController@form_general');
Route::get('form/select2','Pike\FormsController@form_select2');
Route::get('form/validation','Pike\FormsController@form_validation');
Route::get('form/text_editor','Pike\FormsController@text_editor');
Route::get('form/multiple_file','Pike\FormsController@multiple_file_upload');
Route::get('form/date_time_picker','Pike\FormsController@date_and_time_picker');
Route::get('form/color_picker','Pike\FormsController@color_picker');

//ExamplePageController controller
Route::get('example/pricing_table','Pike\ExamplePageController@pricing_table');
Route::get('example/countdown','Pike\ExamplePageController@countdown');
Route::get('example/invoice','Pike\ExamplePageController@invoice');
Route::get('example/login_register','Pike\ExamplePageController@login_register');
Route::get('example/blank_page','Pike\ExamplePageController@blank_page');
