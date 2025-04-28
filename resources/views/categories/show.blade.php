@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Description</h2>
            <p class="text-gray-600">{{ $category->description ?? 'Pas de description' }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Éléments de cette catégorie</h2>
            @if($category->elements->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($category->elements as $element)
                        <div class="border rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $element->name }}</h3>
                            @if($element->image_path)
                                <img src="{{ Storage::url($element->image_path) }}" alt="{{ $element->name }}" class="w-full h-32 object-cover rounded mb-2">
                            @endif
                            <p class="text-gray-600 mb-2">{{ $element->description ?? 'Pas de description' }}</p>
                            @if($element->audio_path)
                                <audio controls class="w-full">
                                    <source src="{{ Storage::url($element->audio_path) }}" type="audio/mpeg">
                                    Votre navigateur ne supporte pas l'élément audio.
                                </audio>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Aucun élément dans cette catégorie.</p>
            @endif
        </div>
    </div>
</div>
@endsection 