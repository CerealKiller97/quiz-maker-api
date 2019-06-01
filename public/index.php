<?php

use \Slim\App;
use \Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::create('../');
$dotenv->load();

require_once __DIR__ . '/../src/settings.php';

$app = new App($settings);

require_once __DIR__ . '/../src/dependencies.php';


$app->get('/', 'HomeController:home');

$app->get('/users', 'UserController:read');
$app->get('/users/{id}', 'UserController:readById');
$app->post('/users', 'UserController:create');
$app->put('/users/{id}', 'UserController:update');
$app->delete('/users/{id}', 'UserController:delete');
$app->get('/users/{id}/quizes', 'UserController:queryQuizes');

$app->get('/quizes', 'QuizController:read');
$app->get('/quizes/{id}', 'QuizController:readById');
$app->post('/quizes', 'QuizController:create');
$app->put('/quizes/{id}', 'QuizController:update');
$app->delete('/quizes/{id}', 'QuizController:delete');
$app->get('/quizes/{id}/user', 'QuizController:queryUser');
$app->get('/quizes/{id}/questions', 'QuizController:queryQuestions');

$app->get('/questions', 'QuestionController:read');
$app->get('/questions/{id}', 'QuestionController:readById');
$app->post('/questions', 'QuestionController:create');
$app->put('/questions/{id}', 'QuestionController:update');
$app->delete('/questions/{id}', 'QuestionController:delete');
$app->get('/questions/{id}/quizes', 'QuestionController:queryQuiz');
$app->get('/questions/{id}/answers', 'QuestionController:queryAnswers');

$app->get('/answers', 'AnswerController:read');
$app->get('/answers/{id}', 'AnswerController:readById');
$app->post('/answers', 'AnswerController:create');
$app->put('/answers/{id}', 'AnswerController:update');
$app->delete('/answers/{id}', 'AnswerController:delete');
$app->get('/answers/{id}/questions', 'AnswerController:queryQuestion');

$app->run();
