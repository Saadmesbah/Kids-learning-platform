@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6">Catégories d'apprentissage</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($categories as $category)
                        <div class="bg-white border rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                            <h3 class="text-xl font-semibold mb-2">{{ $category->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $category->description ?? 'Aucune description disponible' }}</p>
                            <p class="text-sm text-gray-500 mb-4">{{ $category->elements->count() }} éléments</p>
                            <a href="{{ route('learning.category', $category) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Explorer
                            </a>
                        </div>
                    @endforeach
                </div>

                @if($categories->isEmpty())
                    <div class="text-center py-8">
                        <p class="text-gray-500">Aucune catégorie disponible pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 