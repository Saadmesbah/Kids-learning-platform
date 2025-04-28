@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Modifier l'Élément</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('elements.update', $element) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Catégorie</label>
                    <select name="category_id" id="category_id" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category_id') border-red-500 @enderror">
                        <option value="">Sélectionnez une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $element->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $element->name) }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description', $element->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    @if($element->image_path)
                        <div class="mb-2">
                            <img src="{{ Storage::url($element->image_path) }}" alt="{{ $element->name }}" class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror">
                    @error('image')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="audio" class="block text-gray-700 text-sm font-bold mb-2">Fichier Audio</label>
                    @if($element->audio_path)
                        <div class="mb-2">
                            <audio controls class="w-full">
                                <source src="{{ Storage::url($element->audio_path) }}" type="audio/mpeg">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>
                        </div>
                    @endif
                    <input type="file" name="audio" id="audio" accept="audio/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('audio') border-red-500 @enderror">
                    @error('audio')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="video" class="block text-gray-700 text-sm font-bold mb-2">Fichier Vidéo</label>
                    @if($element->video_path)
                        <div class="mb-2">
                            <video controls class="w-full rounded-lg shadow-md">
                                <source src="{{ Storage::url($element->video_path) }}" type="video/mp4">
                                Votre navigateur ne supporte pas l'élément vidéo.
                            </video>
                        </div>
                    @endif
                    <input type="file" name="video" id="video" accept="video/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('video') border-red-500 @enderror">
                    @error('video')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('elements.show', $element) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Annuler
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 