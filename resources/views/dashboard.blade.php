@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-100 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Gestion des catégories</h3>
                            <p class="mb-4">Gérez les catégories d'apprentissage pour les enfants.</p>
                            <a href="{{ route('categories.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Voir les catégories
                            </a>
                        </div>

                        <div class="bg-green-100 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold mb-4">Gestion des éléments</h3>
                            <p class="mb-4">Ajoutez et gérez les éléments d'apprentissage.</p>
                            <a href="{{ route('elements.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                Voir les éléments
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <h3 class="text-lg font-semibold mb-4">Bienvenue sur la plateforme d'apprentissage</h3>
                        <p class="mb-4">Explorez les catégories et les éléments pour commencer à apprendre.</p>
                        <a href="{{ route('learning.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Commencer l'apprentissage
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
