<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{


    private $cmt;

    public function __construct()
    {
        $this->cmt = new Comment();
    }


    public function index()
    {

        $cmts = $this->cmt->latest()->take(10)->get();
        return view('admin.home', compact('cmts'));
    }
}