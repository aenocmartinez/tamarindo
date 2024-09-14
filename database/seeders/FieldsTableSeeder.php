<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FieldSingle;
use App\Models\FieldComposite;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear campos simples
        $simpleField1 = FieldSingle::create([
            'name' => 'Título',
        ]);

        $simpleField2 = FieldSingle::create([
            'name' => 'Descripción',
        ]);

        // Crear campos compuestos
        $compositeField1 = FieldComposite::create([
            'name' => 'Dirección',
        ]);

        $compositeField2 = FieldComposite::create([
            'name' => 'Información de Contacto',
        ]);

        // Crear y asociar subcampos para el campo compuesto "Dirección"
        $subfield1 = FieldSingle::create(['name' => 'Calle']);
        $subfield2 = FieldSingle::create(['name' => 'Ciudad']);
        $subfield3 = FieldSingle::create(['name' => 'Código Postal']);

        // Asociar los subcampos al campo compuesto "Dirección"
        $compositeField1->subfields()->attach($subfield1->id, ['order' => 1]);
        $compositeField1->subfields()->attach($subfield2->id, ['order' => 2]);
        $compositeField1->subfields()->attach($subfield3->id, ['order' => 3]);

        // Crear y asociar subcampos para el campo compuesto "Información de Contacto"
        $subfield4 = FieldSingle::create(['name' => 'Teléfono']);
        $subfield5 = FieldSingle::create(['name' => 'Correo Electrónico']);

        // Asociar los subcampos al campo compuesto "Información de Contacto"
        $compositeField2->subfields()->attach($subfield4->id, ['order' => 1]);
        $compositeField2->subfields()->attach($subfield5->id, ['order' => 2]);
    }
}
