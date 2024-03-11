<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userInput');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'password' => 'required|string|max:255',
        ]);

        User::create($validatedData);
        // dd($validatedData);

        return redirect()->back()->with('success', 'Data has been stored successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

       $userData =  User::whereId($id)->get();

       return view('userShow', compact('userData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $userData =  User::whereId($id)->get();

        return view('userEdit', compact('userData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
        ]);

        User::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', 'Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        User::whereId($id)->delete();

        return redirect()->back()->with('success', 'Data has been deleted successfully!');
    }
}
