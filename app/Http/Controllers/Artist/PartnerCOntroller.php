<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerCOntroller  
{
    public function show(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('artist.partnersDetails',compact('partner'));
    }
}
