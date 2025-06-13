<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $projects->first()->name;
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project')); // ✅ FIXED from 'projects'
    }

    public function store(Request $request)
    {
        $project = Project::create($request->only('name'));
        return redirect()->route('projects.show', $project);
    }

    public function storeInvoice(Project $project, Request $request)
    {
        $project->invoices()->create($request->only('amount'));
        return back();
    }

    public function storeExpense(Project $project, Request $request)
    {
        $project->expenses()->create($request->only('category', 'amount'));
        return back();
    }

    public function create()
    {
        return view('projects.create');
    }
}
