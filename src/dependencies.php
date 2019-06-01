<?php

use \App\Controllers\HomeController;
use \App\Controllers\UserController;
use \App\Controllers\PostController;
use \App\Services\UserService;
use \App\Services\PostService;
use \App\Services\QuizService;
use \App\Services\QuestionService;
use \App\Services\AnswerService;
use \App\Controllers\AnswerController;
use \App\Controllers\QuizController;
use \App\Controllers\QuestionController;
use \Illuminate\Database\Capsule\Manager as Capsule;

$container = $app->getContainer();
$container['db'] = function ($container) {
    $capsule = new Capsule();
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['HomeController'] = function () {
    return new HomeController();
};

$container['UserController'] = function ($c) {
    $table = $c->get('db')->table('users');
    $userService = new UserService($table);
    return new UserController($userService);
};

$container['PostController'] = function ($c) {
    $table = $c->get('db')->table('posts');
    $postService = new PostService($table);
    return new PostController($postService);
};

$container['QuizController'] = function ($c) {
    $table = $c->get('db')->table('quizes');
    $quizService = new QuizService($table);
    return new QuizController($quizService);
};

$container['QuestionController'] = function ($c) {
    $table = $c->get('db')->table('questions');
    $questionService = new QuestionService($table);
    return new QuestionController($questionService);
};

$container['AnswerController'] = function ($c) {
    $table = $c->get('db')->table('answers');
    $answerService = new AnswerService($table);
    return new AnswerController($answerService);
};
