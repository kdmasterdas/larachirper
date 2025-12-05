<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Support\Facades\Gate;


class ChirpController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $chirps = Chirp::with('user')->latest()
            ->paginate(2);  // Limit to 50 most recent chirps
            // ->get();
        return view ('home', ['chirps' => $chirps]);
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
        //
        $validate = $request->validate([
            'message' => 'required|max:255',
        ]);

        auth()->user()->chirps()->create($validate);

        // Chirp::create($validate);

        return redirect('/')->with('success', 'Chirp created successfully!');
        
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
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        // $chirpData = Chirp::find($id);
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $validate = $request->validate([
            'message' => 'required|max:255'
        ]);

        $chirp->update($validate);

        return redirect('/')->with('success', 'Chirp updated successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        // dd($chirp);
        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted successfully!');
    }
}
