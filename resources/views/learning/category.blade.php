@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <a href="{{ route('learning.index') }}" class="text-blue-500 hover:text-blue-600 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Retour aux catégories
        </a>
    </div>

    <h1 class="text-4xl font-bold text-gray-800 mb-8">{{ $category->name }}</h1>
    <p class="text-gray-600 mb-8">{{ $category->description ?? 'Découvrez les éléments de cette catégorie' }}</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($elements as $element)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                @if($element->image_path)
                    <img src="{{ Storage::url($element->image_path) }}" 
                         alt="{{ $element->name }}" 
                         class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $element->name }}</h2>
                    <p class="text-gray-600 mb-4">{{ $element->description ?? 'Découvrez cet élément' }}</p>
                    <div class="flex justify-between items-center">
                        @if($element->audio_path)
                            <audio controls class="w-full">
                                <source src="{{ Storage::url($element->audio_path) }}" type="audio/mpeg">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 