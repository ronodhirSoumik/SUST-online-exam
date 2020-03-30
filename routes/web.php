<?php
//Route::get('/', function () { return redirect('/admin/home'); });

//Soumik
Route::get('/start', function () {
    return view('start');
});

Route::get('/astart', function () {
    return view('againStart');
});

Route::get('lesson/{course_id}/{title}', ['uses' => 'LessonController@show', 'as' => 'lessons.show']);
Route::post('lesson/{title}/exam', ['uses' => 'LessonController@exam', 'as' => 'lessons.exam']);


Route::get('/dashboard', 'HomeController@index') -> name('dashboard');

Route::get('/', function(){
     return redirect('start');
});

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/showResult', 'ShowResultController@index')->name('showResult');;

//course and lesson controllers
Route::get('course/{course_name}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
//Route::post('course/payment', ['uses' => 'CoursesController@payment', 'as' => 'courses.payment']);
//Route::post('course/{course_id}/rating', ['uses' => 'CoursesController@rating', 'as' => 'courses.rating']);
//lesson controllers
Route::get('lesson/{title}', ['uses' => 'LessonController@show', 'as' => 'lessons.show']);
//Route::post('lesson/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');



//////////////////ekhane problem
Route::post('insert', 'Controller@ins');
Route::post('insert1', 'Controller@ins1');
Route::post('insert2', 'Controller@ins2');



//////////////////////





// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
   // Route::get('/home', 'HomeController@index');
    Route::get('/home', 'Admin\DashboardController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('courses', 'Admin\CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
    Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);
    Route::resource('lessons', 'Admin\LessonsController');
    Route::post('lessons_mass_destroy', ['uses' => 'Admin\LessonsController@massDestroy', 'as' => 'lessons.mass_destroy']);
    Route::post('lessons_restore/{id}', ['uses' => 'Admin\LessonsController@restore', 'as' => 'lessons.restore']);
    Route::delete('lessons_perma_del/{id}', ['uses' => 'Admin\LessonsController@perma_del', 'as' => 'lessons.perma_del']);
    Route::resource('questions', 'Admin\QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'Admin\QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::post('questions_restore/{id}', ['uses' => 'Admin\QuestionsController@restore', 'as' => 'questions.restore']);
    Route::delete('questions_perma_del/{id}', ['uses' => 'Admin\QuestionsController@perma_del', 'as' => 'questions.perma_del']);
    Route::resource('question_options', 'Admin\QuestionOptionsController');
    Route::post('question_options_mass_destroy', ['uses' => 'Admin\QuestionOptionsController@massDestroy', 'as' => 'question_options.mass_destroy']);
    Route::post('question_options_restore/{id}', ['uses' => 'Admin\QuestionOptionsController@restore', 'as' => 'question_options.restore']);
    Route::delete('question_options_perma_del/{id}', ['uses' => 'Admin\QuestionOptionsController@perma_del', 'as' => 'question_options.perma_del']);
    Route::resource('exams', 'Admin\ExamsController');
    Route::post('exams_mass_destroy', ['uses' => 'Admin\ExamsController@massDestroy', 'as' => 'exams.mass_destroy']);
    Route::post('exams_restore/{id}', ['uses' => 'Admin\ExamsController@restore', 'as' => 'exams.restore']);
    Route::delete('exams_perma_del/{id}', ['uses' => 'Admin\ExamsController@perma_del', 'as' => 'exams.perma_del']);



 
});
