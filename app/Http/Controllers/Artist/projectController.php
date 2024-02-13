<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class projectController extends Controller
{
    public function index(){

        $projects = auth()->user()->projects;

        return view('artist.index',compact('projects'));
    }
}
