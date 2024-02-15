@extends('master')
@section('content')
<!-- Affichage du message de succès -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Affichage du message d'erreur -->
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="w-full mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Les projects
    </p>
    <div class="bg-white overflow-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <button class="flex items-center gap-x-3 focus:outline-none">
                            <span>id</span>
                            <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- SVG pour l'icône de tri -->
                            </svg>
                        </button>
                    </th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Nom art</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Nom de projet</th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">{{ $project->id }}</td>
                    <td class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        @foreach ($project->users as $user)
                            {{ $user->name }},
                        @endforeach
                    </td>
                    <td class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">{{ $project->titre }}</td>
                    <td class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <form action="{{ route('projects.accept', $project->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="py-1 px-2 bg-green-500 text-white rounded hover:bg-green-600">Accepter</button>
                        </form>
                        <form action="{{ route('projects.refuse', $project->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="py-1 px-2 bg-red-500 text-white rounded hover:bg-red-600">Refuser</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
