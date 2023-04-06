@extends('layouts.app')

@section('main')
   <!-- component -->
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
	<div class="bg-white-300 rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            <h1 class="text-grey-darkest">Todo List</h1>
            <form action="{{ route('add')}}" method="post">
                @csrf
                    <div class="flex mt-4">
                    <input name="task" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-white-darker" placeholder="Ajouter votre tâche">
                    <button class="flex-no-shrink p-1 border-teal hover:text-red hover:bg-teal rounded-full hover:rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </button>
                </div>
            </form>
        @error('task')
            <p class="text-red-500 p-1"> {{$message}} <br> Vous devez saisir une tâche</p>
        @enderror
        </div>
        <div>
            @forelse ($todos as $itemTodo )
                <div class="flex mb-4 items-center">
                    <!--@if ($itemTodo->status == 'n')
                        <p class="w-full text-grey-darkest">{{$itemTodo->task}}</p>
                    @else
                        <p class="w-full text-grey-darkest line-through">{{$itemTodo->task}}</p>
                    @endif-->
                    <p class="w-full text-grey-darkest {{$itemTodo->status=='o'?'line-through':''}}">{{$itemTodo->task}}</p>
                    <a href="{{ route('upd', $itemTodo->id)}}" class="flex-no-shrink p-1 ml-4 mr-2 border-2 rounded-full bg-green-500 border-black hover:bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 bg-green">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                      </a>  <!--  {{$itemTodo->status=='o'?'Not':''}} Done -->
                    <a href="{{ route('del', $itemTodo->id)}}" class="flex-no-shrink p-1 ml-2 border-2 rounded-full bg-red-500 border-black hover:bg-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                      </a>
                </div>
            @empty
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">Vous n'avez pas de tâches</p>
                </div>
            @endforelse
            <!--
            @foreach ( $todos as $todo )
                <div class="flex mb-4 items-center">
                    <p class="w-full text-grey-darkest">{{$todo->task}}</p>
                    <a href="{{ route('upd', $todo->id)}}" class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">Done</a>
                    <a href="{{ route('del', $todo->id)}}" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove</a>
                </div>
            @endforeach
            -->
        </div>
    </div>
</div>

@endsection