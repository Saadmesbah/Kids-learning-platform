@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('learning.category', $element->category) }}" class="text-blue-500 hover:text-blue-600 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Retour à la catégorie
        </a>
    </div>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($element->image_path)
                <img src="{{ Storage::url($element->image_path) }}" 
                     alt="{{ $element->name }}" 
                     class="w-full h-64 object-cover">
            @endif
            
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $element->name }}</h1>
                <p class="text-gray-600 mb-6">{{ $element->description ?? 'Découvrez cet élément' }}</p>

                @if($element->audio_path)
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Écouter</h2>
                        <audio controls class="w-full">
                            <source src="{{ Storage::url($element->audio_path) }}" type="audio/mpeg">
                            Votre navigateur ne supporte pas l'élément audio.
                        </audio>
                    </div>
                @endif

                <div class="mt-6 pt-6 border-t">
                    <p class="text-sm text-gray-500">
                        Catégorie : <span class="text-gray-800">{{ $element->category->name }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 