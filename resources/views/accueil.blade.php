@extends('layouts.app')

@section('main')
   <!-- component -->
<div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
	<div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
        <div class="mb-4">
            <h1 class="text-grey-darkest">Todo List</h1>
            <form action="{{ route('add')}}" method="post">
                @csrf
                    <div class="flex mt-4">
                    <input name="task" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-white-darker" placeholder="Ajouter votre tâche">
                    <button class="flex-no-shrink p-2 border-2 text-teal border-teal hover:text-red hover:bg-teal btn btn-primary btn-lg ms-2 rounded hover:rounded-lg">Add</button>
                </div>
            </form>
        </div>
        <div>
            @forelse ($todos as $itemTodo )
                <div class="flex mb-4 items-center">
                    @if ($itemTodo->status == 'n')
                        <p class="w-full text-grey-darkest">{{$itemTodo->task}}</p>
                    @else
                        <p class="w-full text-grey-darkest line-through">{{$itemTodo->task}}</p>
                    @endif
                    <a href="{{ route('upd', $itemTodo->id)}}" class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-red text-green border-green hover:bg-green"> {{$itemTodo->status=='o'?'Not':''}} Done</a>
                    <a href="{{ route('del', $itemTodo->id)}}" class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-red hover:bg-red">Remove</a>
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