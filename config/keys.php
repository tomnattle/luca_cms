<?php
return [
    'user_login' => function($username){
        return 'user_login_' . md5($username);
    },
];