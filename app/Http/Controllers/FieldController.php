<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldComposite;
use App\Models\FieldSingle;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function index()
    {
        $perPage = 5;
        $paginatedFields = Field::paginate($perPage);
        $fields = [];

        foreach ($paginatedFields as $field) {
            if ($field->hasSubfields()) {
                $fields[] = new FieldComposite($field->getAttributes());
                continue;
            }
            $fields[] = new FieldSingle($field->getAttributes());
        }

        $paginatedFields->setCollection(collect($fields));

        return view('fields.index', ['fields' => $paginatedFields]);
    }

    public function create()
    {
        return view('fields.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:simple,composite',
        ]);

        if ($validatedData['type'] === 'composite') {
            $field = FieldComposite::create(['name' => $validatedData['name']]);
        } else {
            $field = FieldSingle::create(['name' => $validatedData['name']]);
        }

        return redirect()->route('fields.index')->with('success', 'Campo creado exitosamente.');
    }

    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    public function update(Request $request, Field $field)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $field->update($validatedData);
        return redirect()->route('fields.index')->with('success', 'Campo actualizado exitosamente.');
    }

    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('fields.index')->with('success', 'Campo eliminado exitosamente.');
    }

    public function manageSubfields(FieldComposite $field)
    {
        $subfields = $field->subfields;        
        return view('fields.manage_subfields', compact('field', 'subfields'));
    }    
}
