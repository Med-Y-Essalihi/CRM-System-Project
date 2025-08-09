<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClientsController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        

        $query = Client::query();

        // Only filter clients if user is logged in and NOT admin
        if (Auth::check() && !Auth::user()->isAdmin()) {
            $query->where('user_id', Auth::id());
        }

        // Filter by search input (name or company)
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // Sort latest and paginate results
        $clients = $query->latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $agents = [];

        if (Auth::check() && Auth::user()->isAdmin()) {
            $agents = User::where('role', 'agent')->get();
        }
        return view('clients.create', compact('agents'));
    }

    
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'notes' => 'nullable|string',
        'user_id' => 'nullable|exists:users,id',
    ]);

    if (Auth::check() && !Auth::user()->isAdmin()) {
        $data['user_id'] = Auth::id();
    }

    Client::create($data);

    return redirect()->route('clients.index')->with('success', 'Client added');
}

    public function show(Client $client)
    {
        $this->authorize('view', $client);

        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $this->authorize('update', $client);

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $this->authorize('update', $client);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated.');
    }

    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted.');
    }

     
}
