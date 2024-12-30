<?php

namespace App\Http\Controllers;

class PageController
{
    public function getAbout()
    {
        return view ('About');
    }
    public function getIndex()
    {
        return view ('index');
    }
}
