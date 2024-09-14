<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCollection;
use Illuminate\Http\Request;
use App\Models\Collection;
use Illuminate\Support\Facades\Log;

class CollectionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $collections = Collection::where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->paginate(10);

        return view('collections.index', compact('collections'));
    }

    public function create() 
    {
        return view('collections.create');
    }

    public function store(SaveCollection $request) 
    {
        $data = $request->validated();

        try {
            Collection::create($data);
            return redirect()->route('collections.index')->with('success', 'Colección creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('collections.create')->withErrors(['error' => 'Ocurrió un error al crear la colección. Inténtalo nuevamente.']);
        }
    }     

    public function edit(Collection $collection)
    {
        return view('collections.edit', compact('collection'));
    }

    public function update(SaveCollection $request, Collection $collection) 
    {
        $data = $request->validated();

        try {
            $collection->update($data);
            return redirect()->route('collections.index')->with('success', 'Colección actualizada exitosamente.');

        } catch (\Exception $e) {
            Log::error('Error al actualizar la colección: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error al actualizar la colección. Por favor, inténtalo de nuevo.']);
        }
    }

    public function show(Collection $collection = null) 
    {
        if (!$collection) {
            return redirect()->route('collections.index')
                             ->with('error', 'La colección solicitada no existe.');
        }
    
        return view('collections.show', compact('collection'));
    }
        
    public function destroy(Collection $collection) 
    {
        try {
            $collection->delete();
            return redirect()->route('collections.index')->with('success', 'La colección se ha eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('collections.index')->with('error', 'Ocurrió un error al eliminar la colección.');
        }
    }
    
}
