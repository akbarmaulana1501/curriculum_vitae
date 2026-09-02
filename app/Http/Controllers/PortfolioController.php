<?php

namespace App\Http\Controllers;

use App\Models\{Education, Experience, Profile, Project, Skill};

class PortfolioController extends Controller
{
    public function index()
    {
        return view('portfolio.index', ['profile' => Profile::first(), 'educations' => Education::orderBy('sort_order')->get(), 'experiences' => Experience::orderBy('sort_order')->get(), 'projects' => Project::orderBy('sort_order')->get(), 'skills' => Skill::orderBy('sort_order')->get()]);
    }
}
