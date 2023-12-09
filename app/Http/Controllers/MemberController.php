<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    public function index(): View
    {
        return view ('members.index');
    }
}
