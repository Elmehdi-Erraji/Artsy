<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class projectController extends Controller
{
    public function index(){


        $projects = auth()->user()->projects()->wherePivot('request_status', 1)->orWherePivot('approval_status', 1)->get();

        return view('artist.index',compact('projects'));
    }


    public function show(string $id)
    {
        dd($id);
        $project = Project::findOrFail($id);

        $partners = $project->partners;


        $users = $project->users()->where(function ($query) {$query->where('approval_status', 0)->orWhere('request_status', 0);})->get();

        return view('artist.projectDetails', compact('project', 'partners', 'users'));
    }


    public function approvalStatus(Request $request)
    {

        // Validate the request
        $request->validate([
            'user_id' => ['required', 'integer'],
            'project_id' => ['required', 'integer'],
            'approval_status' => ['required', 'integer', Rule::in([1, 2])],
        ]);

        // Retrieve user and project
        $user = User::findOrFail($request->user_id);
        $project = Project::findOrFail($request->project_id);

        $userProject = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->firstOrFail();
        $userProject->approval_status = $request->approval_status;
        $userProject->save();

        return redirect()->back()->with('success', 'Request status updated successfully.');
    }


    public function requestStatus(Request $request)
    {

        $request->validate([
            'user_id' => ['required', 'integer'],
            'project_id' => ['required', 'integer'],
            'request_status' => ['required', 'integer', Rule::in([0, 1, 2])],
        ]);

        // Retrieve user and project
        $user = User::findOrFail($request->user_id);
        $project = Project::findOrFail($request->project_id);

        $existingRequest = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->where('request_status', 0)->exists();

        if ($existingRequest) {
            return redirect()->back()->with('success00', 'You have already applied for this project.');
        }

        $projectAssigned = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->where('approval_status', 0)->exists();

        if ($projectAssigned) {
            return redirect()->back()->with('success', 'This project has already been assigned to you. Please check your profile.');
        }
        // Update the request status
        $userProject = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->firstOrFail();
        $userProject->request_status = $request->request_status;
        $userProject->approval_status = 5;
        $userProject->save();

        return redirect()->back()->with('success', 'Your Request Is Sent Successfully.');
    }

//    public function requestStatus(Request $request)
//    {
//        $request->validate([
//            'user_id' => ['required', 'integer'],
//            'project_id' => ['required', 'integer'],
//            'request_status' => ['required', 'integer', Rule::in([0, 1, 2])],
//        ]);
//
//        // Retrieve user and project
//        $user = User::findOrFail($request->user_id);
//        $project = Project::findOrFail($request->project_id);
//
//        // Check if there's an existing request for this project with request_status = 0
//        $existingRequest = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->where('request_status', 0)->exists();
//
//        if ($existingRequest) {
//            return redirect()->back()->with('error', 'You have already applied for this project.');
//        }
//
//        // Check if the project is already assigned to the user
//        $projectAssigned = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->where('approval_status', 0)->exists();
//
//        if ($projectAssigned) {
//            return redirect()->back()->with('error', 'This project has already been assigned to you. Please check your profile.');
//        }
//
//        // Update the request status
//        $userProject = ProjectUser::where('user_id', $user->id)->where('project_id', $project->id)->firstOrFail();
//
//        $userProject->request_status = $request->request_status;
//        $userProject->approval_status = 5;
//        $userProject->save();
//
//        return redirect()->back()->with('success', 'Your request has been sent successfully.');
//    }

    public function destroy(ProjectUser  $request)
    {
        $projectUser = ProjectUser::findOrFail($request->user_id);
        $projectUser->delete();
        return redirect()->route('projectusers.index')->with('success','deleted with success');

    }



}
