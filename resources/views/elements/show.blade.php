@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $element->name }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('elements.edit', $element) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                    Modifier
                </a>
                <form action="{{ route('elements.destroy', $element) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informations</h2>
                    <div class="mb-4">
                        <p class="text-gray-600 font-semibold">Catégorie</p>
                        <p class="text-gray-800">{{ $element->category->name }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 font-semibold">Description</p>
                        <p class="text-gray-800">{{ $element->description ?? 'Pas de description' }}</p>
                    </div>
                </div>

                @if($element->image_path)
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Image</h2>
                        <img src="{{ Storage::url($element->image_path) }}" alt="{{ $element->name }}" class="w-full rounded-lg shadow-md">
                    </div>
                @endif
            </div>

            @if($element->audio_path)
                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Audio</h2>
                    <audio controls class="w-full">
                        <source src="{{ Storage::url($element->audio_path) }}" type="audio/mpeg">
                        Votre navigateur ne supporte pas l'élément audio.
                    </audio>
                </div>
            @endif

            @if($element->video_path)
                <div class="mt-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Vidéo</h2>
                    <video controls class="w-full rounded-lg shadow-md">
                        <source src="{{ Storage::url($element->video_path) }}" type="video/mp4">
                        Votre navigateur ne supporte pas l'élément vidéo.
                    </video>
                </div>
            @endif
        </div>

        <div class="flex justify-end">
            <a href="{{ route('elements.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection 