<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Environment;
use App\Mail\TestEmail;


use App\Http\Controllers\RegisterEnvironmentController;

use App\Http\Controllers\MessagesHudController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\PointerHudController;
use App\Http\Controllers\UsersHudController;
use App\Http\Controllers\ProductsHudController;


use App\Http\Controllers\TaskController;
use App\Http\Controllers\ShopHudController;

use App\Http\Controllers\Reports\Tables\Users\Table_all_UsersController;
use App\Http\Controllers\Reports\Tables\Events\Table_all_EventsController;
use App\Http\Controllers\Reports\Tables\Console\Table_all_LogsController;

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
    return view('welcome');
});

Auth::routes(['veriy'=>true]);
route::get ('/home','HomeController@index')->middleware('verified');

Auth::routes(['veriy'=>true]);
route::get ('/usershud','UsersHudController@Usershudfun')->middleware('verified');

Auth::routes(['veriy'=>true]);
route::get ('/mailbox','MessagesHud@Messageshudfun')->middleware('verified');

Auth::routes(['veriy'=>true]);
route::get ('/requestshud','RequestsHudController@Requestshudfun')->middleware('verified');

Auth::routes(['veriy'=>true]);
route::get ('/scaleshud','ScalesHudController@scaleshudfun')->middleware('verified');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/usershud', [App\Http\Controllers\UsersHudController::class, 'Usershudfun'])->name('usershud');
Route::post('/usershud/newuser',[App\Http\Controllers\UsersHudController::class,'storeuser'])->name('/create-user');
Route::post('/usershud/newgroup',[App\Http\Controllers\UsersHudController::class,'storegroup'])->name('/create-group');
Route::post('/usershud/newcharge',[App\Http\Controllers\UsersHudController::class,'storecharge'])->name('/create-charge');
Route::post('/usershud/newpermition',[App\Http\Controllers\UsersHudController::class,'storepermition'])->name('/create-permition');

Route::delete('/usershud/user/delete/{id}',[UsersHudController::class, 'userdestroy']);
Route::delete('/usershud/group/delete/{id}',[UsersHudController::class, 'groupdestroy']);
Route::delete('/usershud/charge/delete/{id}',[UsersHudController::class, 'chargedestroy']);
Route::delete('/usershud/permition/delete/{id}',[UsersHudController::class, 'permitiondestroy']);

Auth::routes();
Route::get('/register', [App\Http\Controllers\UsersHudController::class, '/register'])->name('register');

Auth::routes();
Route::get('/mailbox', [App\Http\Controllers\MessagesHudController::class, 'messageshudfun'])->name('messageshud');
Route::get('/mailbox/delete/{id}', [App\Http\Controllers\MessagesHudController::class, 'messagedestroy']);
Route::get('/newmessage', [App\Http\Controllers\MessagesHudController::class, 'newmessage'])->name('newmessage');
Route::get('/read/message/{id}', [App\Http\Controllers\MessagesHudController::class, 'readmessage']);

Auth::routes();
Route::get('/reportshud', [App\Http\Controllers\ReportsHudController::class, 'reportshudfun'])->name('reportshud');

Route::get('/marketplace', [App\Http\Controllers\ShopHudController::class, 'marketplace'])->name('marketplace');
Auth::routes();
Route::get('/shop', [App\Http\Controllers\ShopHudController::class, 'shop'])->name('shop');
Auth::routes();
Route::get('/detail/{id}', [App\Http\Controllers\ShopHudController::class, 'detail'])->name('detail');
Route::get('/editproduct/{id}', [App\Http\Controllers\ShopHudController::class, 'editproduct'])->name('editproduct');
Route::PUT('/editproduct/{id}', [App\Http\Controllers\ShopHudController::class, 'updateprod'])->name('updateprod');

Auth::routes();
Route::get('/marketplace/mycart', [App\Http\Controllers\ShopHudController::class, 'cart'])->name('cart');
Route::post('/addToCart', [App\Http\Controllers\ShopHudController::class, 'addToCart'])->name('addToCart');
Auth::routes();
Route::get('/checkout', [App\Http\Controllers\ShopHudController::class, 'checkout'])->name('checkout');
Auth::routes();
Route::get('/contact', [App\Http\Controllers\ShopHudController::class, 'contact'])->name('contact');
Auth::routes();
Route::post('/saveReview', [App\Http\Controllers\ShopHudController::class, 'saveReview'])->name('saveReview');

Route::get('/test', [App\Http\Controllers\ProductsHudController::class, 'test']);

Route::get('/products', [App\Http\Controllers\ProductsHudController::class, 'products'])->name('products');
Route::post('/products/newcategorie', [App\Http\Controllers\ProductsHudController::class, 'storecategorie'])->name('/create-categorie');
Route::post('/products/newcustom', [App\Http\Controllers\ProductsHudController::class, 'storecustom'])->name('/create-custom');
Route::post('/products/newproduct', [App\Http\Controllers\ProductsHudController::class, 'storeproduct'])->name('/create-product');


Route::delete('/producthud/product/delete/{id}',[ProductsHudController::class, 'productdestroy']);
Route::delete('/producthud/categorie/delete/{id}',[ProductsHudController::class, 'categoriedestroy']);
Route::delete('/producthud/custom/delete/{id}',[ProductsHudController::class, 'customdestroy']);
Route::delete('/producthud/subcaegorie/delete/{id}',[ProductsHudController::class, 'subcategoriesdestroy']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();
Route::get('/report/console/list-all-logs', [App\Http\Controllers\Reports\Tables\Console\Table_all_LogsController::class, 'table_all_logs'])->name('/report/console/list-all-logs');

Auth::routes();
Route::get('/report/scales/list-all-events', [App\Http\Controllers\Reports\Tables\Events\Table_all_EventsController::class, 'table_all_events'])->name('/report/scales/list-all-events');

Auth::routes();
Route::get('/report/users/list-all-users', [App\Http\Controllers\Reports\Tables\Users\Table_all_UsersController::class, 'table_all_users'])->name('/report/users/list-all-users');

Auth::routes();
Route::get('/scaleshud', [App\Http\Controllers\ScalesHudController::class, 'scaleshudfun'])->name('scaleshud');

Route::get('/full-calender',[App\Http\Controllers\FullCalenderController::class,'index']);
Route::post('/full-calender',[App\Http\Controllers\FullCalenderController::class,'store'])->name('/create-event');


Route::get('/add-Envirolment',[App\Http\Controllers\RegisterEnvironmentController::class,'index'])->name('Register-Institution');

Route::post('/create-enviroment',[App\Http\Controllers\RegisterEnvironmentController::class,'store'])->name('/create-enviroment');

Route::post('/mailbox',[App\Http\Controllers\MessagesHudController::class,'store'])->name('/create-messages');


Route::get('/pointerhud',[App\Http\Controllers\PointerHudController::class,'pointerhud'])->name('pointerhud');
Route::post('/create-start',[App\Http\Controllers\PointerHudController::class,'storestart'])->name('/create-start');
Route::post('/create-end',[App\Http\Controllers\PointerHudController::class,'storeend'])->name('/create-end');

Route::post('/pointerhud',[App\Http\Controllers\PointerHudController::class,'storepoint'])->name('/day-register');


Route::get('/approvedrequest', [App\Http\Controllers\ApproveRequestsController::class, 'approvedrequest'])->name('approvedrequest');

Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
Route::get('/tasks/list-pcp', [App\Http\Controllers\TaskController::class, 'listpcp'])->name('/tasks/list-pcp');

Route::get('/storage', [App\Http\Controllers\StorageHudController::class, 'storage'])->name('storage');
Route::get('/settings', [App\Http\Controllers\SettingHudController::class, 'settings'])->name('settings');


Route::get('/verify', function () {
    return view ('verify');
});

