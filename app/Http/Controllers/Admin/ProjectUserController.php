<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectUserRequest;
use App\Models\Partner;
use App\Models\ProjectUser;
use Illuminate\Http\Request;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index',compact('partners'));
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
    public function store(ProjectUserRequest $request)
    {
        $projectUser = ProjectUser::create($request->all());
        return redirect()->route('projectusers.index')->with('success','created with success');

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
