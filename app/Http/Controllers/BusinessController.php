<?php

namespace App\Http\Controllers;

use App\Models\Buiness;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function inddex(){
        $businesses = Buiness::all();
        return view('business.index', compact('businesses'));
    }

    public function create(){
        return view('business.create');
    }

    public function store(Request $request){
        $request->validate([
            'contact_email' => 'nullable | email',
            'business_name' => 'nullable'
        ]);

        Buiness::create([
            'contact_email' => $request->contact_email,
            'business_name' => $request->business_name,
        ]);

        return to_route('business.index');
    }

    public function edit(Buiness $buiness){
        return view('business.edit', compact('business'));
    }

    public function update(Request $request, Buiness $buiness){
        $request->validate([
            'contact_email' => 'nullable | email',
            'business_name' => 'nullable'
        ]);

        $buiness->update([
            'contact_email' => $request->contact_email,
            'business_name' => $request->business_name,
        ]);
        return to_route('business.index');
    }

    public function destroy(Buiness $buiness){
        $buiness->delete();
        return to_route('business.index');
    }
}
