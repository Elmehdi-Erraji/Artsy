<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectUserRequest;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomingRequests = ProjectUser::with('user', 'project')->where('request_status', '=', 0)->get();
        $assignedProjects = ProjectUser::with('user', 'project')->where('approval_status', '=', 0)->get();

        return view('admin.requests.index', compact('incomingRequests', 'assignedProjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partners = Partner::all();
        return view('admin.partners.create',compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project_id = $request->input('project_id');
        $selected_users = $request->input('selected_users', []);

        // Get the project
        $project = Project::findOrFail($project_id);

        $syncData = [];
        foreach ($selected_users as $user_id) {
            $syncData[$user_id] = [
                'request_status' => 3,
                'approval_status' => 0
            ];
        }
        $project->users()->sync($syncData);

        return redirect()->route('projects.index')->with('success', 'Users assigned successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUserRequest $request, ProjectUser $projectUser)
    {
        $projectUser->Update($request->all());
        return redirect()->route('projectusers.index')->with('success','updated with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectUser  $projectUser)
    {
        $projectUser->delete();
        return redirect()->route('projectusers.index')->with('success','deleted with success');

    }
}
