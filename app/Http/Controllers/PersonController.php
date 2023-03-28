<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::all();

        return response()->json($person,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $payload = $this->payload($request);

       $person = Person::create($payload);

       return response()->json($person, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $person = Person:: where ('id', $id)->first();

        return response()->json($person, 200);
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
    public function update(Request $request, string $id)
    {
        $payload = $this->payload($request);

        $person = Person:: where ('id', $id)->first();

        $person->update($payload);

        return response()->json($person, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = Person:: where ('id', $id)->first();
        $person->delete();
        return response ('', 204);
    }

    public function payload($request)
    {
        return $this->validate($request, [
            'name'=> ['required'],
            'gender'=> ['required', Rule::in(['Male', 'Female'])],
            'place_of_birth' => ['required'],
            'birthday' => ['required', 'date']

       ]);

    }
}
