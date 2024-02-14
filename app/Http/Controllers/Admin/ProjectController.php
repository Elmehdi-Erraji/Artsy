<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController  
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects  = Project::all();
        $users = User::where('status', 1)->whereHas('roles', function ($query) {$query->where('name', 'artist');})->get();
        return view('admin.projects.index',compact('projects','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partners = Partner::all();
        return view('admin.projects.create',compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $project = Project::create($request->all());
        $project->partners()->attach($request->input('partners', []));
        $project->addMediaFromRequest('project')->usingName($project->id)->toMediaCollection('projects');
        return redirect()->route('projects.index')->with('success','Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        $partners = $project->partners;


        $users = $project->users()->where(function ($query) {$query->Where('request_status', 5);})->get();

        return view('admin.projects.show', compact('project', 'partners', 'users'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $partners = Partner::all();
        return view('admin.projects.edit',compact('project','partners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        $project->partners()->sync($request->input('partners', []));
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();
        ProjectUser::where('project_id', $project->id)->delete();
        return redirect()->route('projects.index')->with('success','Project deleted successfully');
    }
}
