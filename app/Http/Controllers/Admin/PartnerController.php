<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Http\Requests\PartnerUpdate;
use App\Models\Partner;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('partner_delete'), \Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN, '403 Forbidden');
        $partners = Partner::all();
        return view('admin.partners.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->all());
//        $partner->projects()->attach($request->input('projects', []));
        $partner->addMediaFromRequest('logo')->usingName($partner->name)->toMediaCollection('partners');
        return redirect()->route('partners.index')->with('success','Partner created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.show',compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerUpdate $request, string $id)
    {
        $partner = Partner::findOrFail($id);

        $partner->update($request->all());

       if($request->hasFile('logo'))
       {
           $partner->clearMediaCollection('partners');
           $partner->addMediaFromRequest('logo')->toMediaCollection('partners');
       }
        return redirect()->route('partners.index')->with('success','partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('success','Partner deleted successfully');

    }
}
