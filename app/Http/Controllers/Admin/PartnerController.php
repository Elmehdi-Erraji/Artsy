<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->all());
        $partner->projects()->attach($request->input('projects', []));

        return redirect()->route('partners.index')->with('success','Partner created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('partners.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, string $id)
    {
        Partner::update($request->all());
        $partner->projects()->sync($request->input('projects', []));
        return redirect()->route('partners.index')->with('success','partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partenr)
    {
        $partenr->delete();
        return redirect()->route('partners.index')->with('success','Partner deleted successfully');

    }
}
