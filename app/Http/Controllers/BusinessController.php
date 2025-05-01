<?php

namespace App\Http\Controllers;

use App\Models\Buiness;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index(){
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

    public function edit(Buiness $business){
        return view('business.edit', compact('business'));
    }

    public function update(Request $request, Buiness $business){
        // dd($business);
        $request->validate([
            'contact_email' => 'nullable | email',
            'business_name' => 'nullable'
        ]);

        $business->update([
            'contact_email' => $request->contact_email,
            'business_name' => $request->business_name,
        ]);
        return to_route('business.index');
    }

    public function destroy(Buiness $business){
        $business->delete();
        return to_route('business.index');
    }
}
