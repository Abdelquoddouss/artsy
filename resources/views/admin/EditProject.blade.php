@extends('master')
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">

<div class="p-4 md:p-5 ">
                <form class="space-y-4"  action="{{ route('projects.update', $projects->id) }}" method="post">
                     @csrf
                     @method('PUT')
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">titre</label>
                        <input type="text" value="{{ $projects->titre}}" name="titre" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">genre</label>
                        <input type="text" value="{{ $projects->genre}}" name="genre" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">description</label>
                        <input type="text" value="{{ $projects->description}}" name="description" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">publication_year</label>
                        <input type="text" value="{{ $projects->publication_year}}" name="publication_year" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name</label>
                        <input type="text" value="{{ $projects->name}}" name="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <label for="partenaire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a partner</label>
                        <select id="partenaire" name="partenaires_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected disabled>Choose a partner</option>
                            @foreach($partners as $partner)
                                <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                            @endforeach
                        </select>
                    
                    <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                </form>
            </div>
            </div>
        </div>
@endsection