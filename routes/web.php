<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::post('/login', function (Request $request) {
    session(['username' => $request->username]);
    return redirect('/subject');
});
Route::get('/subject', function () {
    if (!session('username')) return redirect('/');
    return view('subject');
});

Route::post('/start-quiz', function (Request $request) {
    $subject = $request->subject;
    $path = storage_path("questions/{$subject}.json");

    if (!file_exists($path)) abort(404);

    $questions = json_decode(file_get_contents($path), true);
    shuffle($questions);
    $selected = array_slice($questions, 0, 10);

    session([
        'questions' => $selected,
        'current' => 0,
        'answers' => [],
        'subject' => $subject
    ]);

    return redirect('/quiz');
});
Route::get('/quiz', function () {
    $questions = session('questions');
    $current = session('current');

    if ($current >= count($questions)) return redirect('/result');

    return view('quiz', [
        'question' => $questions[$current],
        'qno' => $current + 1
    ]);
});

Route::post('/answer', function (Request $request) {
    $answers = session('answers', []);
    $answers[] = [
        'given' => $request->answer,
        'correct' => $request->correct
    ];
    session(['answers' => $answers]);
    session(['current' => session('current') + 1]);

    return redirect('/quiz');
});
Route::get('/result', function () {
    $answers = session('answers');
    $score = 0;
    session(['score' => $score]); // Add this

    foreach ($answers as $ans) {
        if ($ans['given'] === $ans['correct']) $score++;
    }

    return view('result', [
        'answers' => $answers,
        'score' => $score
    ]);
});

Route::get('/certificate', function () {
    $username = session('username');
    $subject = session('subject');
    $score = session('score', 0);

    return view('certificate', compact('username', 'subject', 'score'));
});

Route::get('/certificate/download', function () {
    $data = [
        'username' => session('username'),
        'subject' => session('subject'),
        'score' => session('score', 0),
    ];
    $pdf = Pdf::loadView('certificate', $data);
    return $pdf->download('Certificate.pdf');
});
