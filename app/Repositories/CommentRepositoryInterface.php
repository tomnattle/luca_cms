<?php
namespace App\Repositories;

interface CommentRepositoryInterface{
    const KEY_POETRY_PORTRY = 101;

    function fetch($func_id, $up_id = 0, $site_id = 0, $pageSize = 10);
}
