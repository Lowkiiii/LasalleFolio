<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\UserSkillsController;
use App\Http\Controllers\UserHonorsAndAwardsController;
use App\Http\Controllers\UserAcademicsController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\QuizController;

//use Illuminate\Foundation\Auth\EmailVerificationRequest;

//Auth::routes(['verify' => true]);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'index']);
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'register'])->name('register.account');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin/index');
    });
    Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
    Route::post('logout', [AuthenticationController::class, 'destroy'])->name('logout');
    
});

Route::middleware('auth')->group(function () {
    // Route::get('studentDashboard', function () {
    //     return view('student.studentDashboard');
    // });

    // Handle /studentDashboard route with UserController
    Route::get('/studentDashboard', [UserController::class, 'studentDashboard'])->name('student.studentDashboard');
    // Handle /studentProf route with UserController
    Route::get('/studentProf', [UserController::class, 'studentProfile'])->name('student.studentProf');
    Route::get('/studentLeaderboard', [UserController:: class ,'studentLeaderboard'])->name('student.studentLeaderboard');
    Route::get('/kerschProf', [UserController:: class ,'kerschProf'])->name('student.kerschProf');

});

Route::middleware('auth')->group(function () {
    // Route::get('studentDashboard', function () {
    //     return view('student.studentDashboard');
    // });

    // Handle /studentDashboard route with UserController
    Route::get('/quiz', [UserController::class, 'quiz'])->name('quiz.quiz');
    // // Handle /studentProf route with UserController
    // Route::get('/quiz', [UserController::class, 'quiz'])->name('quiz.quiz');
  

});


Route::middleware('auth')->group(function () {
    // Projects routes
    Route::post('/projects', [UserProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects', [UserProjectController::class, 'index'])->name('projects.index');
    // Route::put('/projects/{id}', [UserProjectController::class, 'update'])->name('projects.update');
    Route::put('/projects/{projects}', [UserProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [UserProjectController::class, 'destroy'])->name('projects.destroy');
   
});

Route::middleware('auth')->group(function () {
    // Skills routes
    Route::post('/skills', [UserSkillsController::class, 'store'])->name('skills.store');
    Route::get('/skills', [UserSkillsController::class, 'index'])->name('skills.index');
    Route::put('/skills/{skill}', [UserSkillsController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{id}', [UserSkillsController::class, 'destroy'])->name('skills.destroy');
});

Route::middleware('auth')->group(function () {
    // Academics routes
    Route::post('/academics', [UserAcademicsController::class, 'store'])->name('academics.store');
    Route::get('/academics', [UserAcademicsController::class, 'index'])->name('academics.index');
    Route::put('/academics/{academics}', [UserAcademicsController::class, 'update'])->name('academics.update');
    Route::delete('/academics/{id}', [UserAcademicsController::class, 'destroy'])->name('academics.destroy');
});

Route::middleware('auth')->group(function () {
    // Honors and Awards routes
    Route::post('/honorsandawards', [UserHonorsAndAwardsController::class, 'store'])->name('honorsandawards.store');
    Route::get('/honorsandawards', [UserHonorsAndAwardsController::class, 'index'])->name('honorsandawards.index');
    Route::put('/honorsandawards/{honorsandawards}', [UserHonorsAndAwardsController::class, 'update'])->name('honorsandawards.update');
    Route::delete('/honorsandawards/{id}', [UserHonorsAndAwardsController::class, 'destroy'])->name('honorsandawards.destroy');
});


Route::middleware('auth')->group(function () {
    // User's Posts routes
    Route::post('/posts', [UserPostController::class, 'store'])->name('posts.store');
    Route::get('/posts', [UserPostController::class, 'index'])->name('posts.index');
    Route::put('/posts/{posts}', [UserPostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [UserPostController::class, 'destroy'])->name('posts.destroy');
});


Route::middleware('auth')->group(function () {
    // search route
    Route::get('/search-user', [UserController::class, 'searchUser'])->name('search.user');

    // Route for viewing the authenticated user's profile
    Route::get('/my-profile', [ProfileController::class, 'myProfile'])->name('profile.my');

    // Route for viewing another user's profile
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    // // Student profile route
    Route::get('/profile', [UserController::class, 'studentProfile'])->name('student.profile');


    //add friend
    Route::post('/send-request/{receiver_id}', [FriendRequestController::class, 'sendRequest'])->name('friend-request.send');
    Route::post('/friend-request/accept/{id}', [FriendRequestController::class, 'acceptRequest'])->name('friendRequest.accept');
    Route::post('/friend-request/reject/{id}', [FriendRequestController::class, 'rejectRequest'])->name('friendRequest.reject');
    // Unfriend route
    Route::post('/friend-request/unfriend/{receiver_id}', [FriendRequestController::class, 'unfriend'])->name('friend-request.unfriend');

    //count accepted requests
    Route::get('/student-profile', [FriendRequestController::class, 'getConnectedStudentsCount'])->name('friendRequest.countAccepted');

    //count reactions
    Route::post('/posts/{post}/react', [UserPostController::class, 'react'])->name('posts.react');

    //comments
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');

    //Interest routes
    Route::get('/interests', [InterestController::class, 'showInterestsForm'])->name('interests.form');
    Route::post('/interests', [InterestController::class, 'storeInterests'])->name('interests.store');

    

    //Search in leaderboards
    Route::get('/leaderboard', [UserController::class, 'studentLeaderboard'])->name('student.leaderboard');
    
    //Pin projects
    Route::post('/pin-projects', [UserController::class, 'pinProjects'])->name('pin.projects');

    // Remove pinned projects
    Route::post('/remove-pinned-project/{id}', [UserController::class, 'removePinnedProject'])->name('pinnedProjects.remove');

    // Update bio
    Route::put('/bio/{user}', [UserController::class, 'updateBio'])->name('bio.update');

    // Remove bio
    Route::delete('/bio/{user}', [UserController::class, 'removeBio'])->name('bio.remove');

    //Quiz Game
    Route::get('/quiz', [QuizController::class, 'generateQuiz'])->name('quiz');
    Route::post('/quiz/submit', [QuizController::class, 'submitQuizAnswer'])->name('quiz.submit');
    Route::get('/quiz/results', [QuizController::class, 'getQuizResults'])->name('quiz.results'); 
    
    Route::get('/profile/other', [UserController::class, 'studentOtherProfile'])->name('profile.other');

                //For making all users connected
                // Route::get('/connect-all-users', [FriendRequestController::class, 'connectAllUsers']);

    Route::post('/profile/image/update', [UserController::class, 'updateProfileImage'])->name('profile.image.update');
    Route::delete('/profile/image/delete', [UserController::class, 'deleteProfileImage'])->name('profile.image.delete');
                    
});


