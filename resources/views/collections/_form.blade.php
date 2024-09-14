<div class="bg-white rounded-lg shadow-lg p-6">
    
    <!-- Nombre de la Colección -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="name" id="name" value="{{ old('name', $collection->name ?? '') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Nombre de la colección" required>
        @if($errors->has('name'))
            <p class="mt-1 text-sm text-red-500">{{ $errors->first('name') }}</p>
        @endif
    </div>

    <!-- Descripción de la Colección -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="description" id="description" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Descripción de la colección">{{ old('description', $collection->description ?? '') }}</textarea>        
        @if($errors->has('description'))
            <p class="mt-1 text-sm text-red-500">{{ $errors->first('description') }}</p>
        @endif
    </div>

    <!-- Botones de Acción -->
    <div class="flex justify-end mt-6">
        <a href="{{ route('collections.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition duration-300 shadow-sm mr-2">
            Cancelar
        </a>
        <button type="submit" class="px-4 py-2 bg-orange-600 text-white text-sm font-medium rounded-lg hover:bg-orange-700 transition duration-300 shadow-sm">
            Guardar Colección
        </button>
    </div>
    
</div>