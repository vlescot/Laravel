<?php
declare(strict_types=1);

namespace MyWay\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;

class UsersController
{
    public function index(Request $request)
    {
        return "
            listing the users
            <br>
            <br>
            <form method='post'>
            <input type='text' name='name'><br>
            <textarea name='content'></textarea>
            <input type='submit'>
            </form>";
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $content = $request->input('content');
        dump($_POST);

        return "$name avec le contenu $content";
    }
}