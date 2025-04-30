<?php

namespace App\Http\Controllers;

use App\Models\Buiness;
use App\Models\Person;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Person::get());
        return view('person.index')->with('people', Person::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Buiness::get();
        return view('person.create', compact('businesses' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->business_id);
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable | email'
        ]);
        Person::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'business_id' => $request->business_id,
            'email' => $request->email,
        ]);
        return redirect(route('person.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $businesses = Buiness::get();
        // $person = Person::find($person);
        return view('person.update',compact('businesses'))->with('person', $person);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable | email'
        ]);
        $person->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'business_id' => $request->business_id,
            'email' => $request->email,
        ]);
        return redirect(route('person.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect(route('person.index'));
    }
}
