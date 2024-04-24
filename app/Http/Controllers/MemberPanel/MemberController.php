<?php

namespace App\Http\Controllers\MemberPanel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SlideShow;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.dashboard');
    }


}
