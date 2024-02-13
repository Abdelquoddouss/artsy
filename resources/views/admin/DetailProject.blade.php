@extends('master')
@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <div class="lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover object-center lg:w-1/2 lg:mx-6 w-full h-96 rounded-lg lg:h-[36rem]" src="{{ $project->getFirstMediaUrl('images') }}" alt="Article">

            <div class="mt-8 lg:w-1/2 lg:px-6 lg:mt-0">
                <p class="text-5xl font-semibold text-blue-500 ">“</p>

                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white lg:text-3xl lg:w-96">
                    {{ $project->titre }}
                </h1>

                <p class="max-w-lg mt-6 text-gray-500 dark:text-gray-400 ">
                    {{ $project->description }}
                </p>

                <h3 class="mt-6 text-lg font-medium text-blue-500">Publication_year</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ $project->publication_year }}</p>

                <h3 class="mt-6 text-lg font-medium text-blue-500">partenaire</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ $project->partenaire->name }}</p>

                
                <h3 class="mt-6 text-lg font-medium text-blue-500">name</h3>
                <p class="text-gray-600 dark:text-gray-300">{{ $project->name }}</p>

          <br>
            <form action="{{route(projects.ajoute)}}" method="post">
            <label for="partenaire" class="mt-6 text-lg font-medium text-blue-500">Select a partner</label>
            <select class="js-example-basic-multiple select2 " name="users[]" multiple="multiple" style="width: 100%;">
                                    <option value="" selected disabled>Choose a partner</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit"  name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                </form>
        </div>
        </div>
    </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
           
            $('.js-example-basic-multiple').select2();
        });
        </script>
    
@endsection
