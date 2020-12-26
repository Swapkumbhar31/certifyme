<?php

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

Route::get('/', 'HomeController@welcome')->name('home');

Auth::routes();

Route::post('/checkout', 'PaymentController@checkOut');
Route::post('/checkout/cancel','PaymentController@cancel');
Route::post('/checkout/success','PaymentController@success');
Route::delete('/checkout', 'CartController@removeFromCart');

Route::get('/register','Auth\RegisterController@index')->name('register');
Route::post('/register','Auth\RegisterController@addUser')->name('register');

Route::get('/cart', 'CartController@index');
Route::get('/cart/checkout', 'CartController@checkout');
Route::delete('/cart', 'CartController@removeFromCart');

Route::get('/images/courses/{id}',function($id)
{
	$path = public_path().'/images/courses/'.$id;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

Route::get('/home', 'HomeController@index');
Route::get('/search', 'CourseController@search');
Route::post('/course/inquiry', 'CourseController@inquiry');
Route::post('/corporate/inquiry', 'CourseController@corporateinquiry');

Route::get('/thankyou','CourseController@thankyou');

Route::get('/about-us','HomeController@aboutUs');
Route::get('/our-team','HomeController@ourteam');
Route::get('/careers','HomeController@careers');
Route::get('/alumini-speck','HomeController@aluminispeck');
Route::get('/contact-us','HomeController@contactus');

Route::get('/course/{name}/{id}', 'CourseController@course');
Route::post('/course/addcart', 'CartController@addToCart');
Route::get('/course/browse/{course_cat}/{id}', 'CourseController@browse');
Route::post('/course/review/add', 'CourseController@addReview');

Route::get('/corporate-training','CourseController@training');

Route::get('/exam/question/{num}','ExamController@showquestion');
Route::post('/exam/question/save/answer','ExamController@save_answer');
Route::get('/exam/submit','ExamController@submit');
Route::post('/exam/submit','ExamController@confirm_submit');
Route::get('/exam/start/{type}/{name?}/{id?}','ExamController@start');
Route::post('/exam/start/{type}/{name?}/{id?}','ExamController@preparequestions');
Route::get('/exam/{type}','ExamController@index');
Route::get('/exam/results/{id}','ExamController@results');
Route::get('/exam/{type}/{name?}/{id?}','ExamController@index');


Route::get('/profile',function ()
{
	return redirect('/user/profile');
});

Route::get('/user/profile','UserController@profile');
Route::get('/user/course','UserController@course');
Route::get('/user/setting','UserController@setting');
Route::get('/user/results','UserController@results');
Route::get('/user/transactions','UserController@transactions');

Route::get('secure/checkout/details/{authtoken}', 'CartController@checkout');
Route::post('secure/checkout/details/{authtoken}', 'UserController@makePayment');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/course/view/{id}', 'AdminController@viewCourse');
Route::post('/admin/course/view/{id}', 'AdminController@updateCource');
Route::get('/admin/course/{action?}/{id?}', 'AdminController@course');
Route::post('/admin/course/add', 'AdminController@addCourse');
Route::post('/admin/course/update/{id}', 'AdminController@UpdateCourse');
Route::post('/admin/course/updatecourse/{id}', 'AdminController@UpdateCourseInfo');
Route::post('/admin/course/updatelesson/{id}', 'AdminController@UpdateLesson');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/advisor', 'AdminController@advisor');
Route::post('/admin/advisor', 'AdminController@addadvisor');
Route::get('/admin/onlineexam/{action?}/{id?}', 'AdminController@onlineexam');
Route::post('/admin/onlineexam/edit/{id}', 'AdminController@editExam');
Route::post('/admin/onlineexam/add', 'AdminController@addExam');
Route::get('/admin/questions/{action?}/{type?}', 'AdminController@questions');
Route::post('/admin/questions/add', 'AdminController@addquestions');

Route::get('/error/{location}/{id}',function($location,$id){
	return $location . " " .$id;
});
