<?php
use App\Site\Comment;
use App\Site\Poetry;
return [
    'poetry.poetry' => [
        'id' => 101,
        'model' => function ($params){
            return (new Poetry());
        },
    ],
    'comment.comment' => [
        'id' => 100,
        'model' => function ($params){
            return (new Comment());
        },
    ]
];