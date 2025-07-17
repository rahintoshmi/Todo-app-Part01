@extends('layouts.Frontend')
@section('topheader', 'All Todos')

@section('content')
<h2 class="text-center">All Todos</h2>

<div class="container">
    <div class="row">
        @foreach ($todos as $key => $todo)
        <div class="col-lg-4">
            <div class="card mt-2 ">
                <div class="card-header">
                     {{ ++$key }}. {{ $todo->title }}

                </div>
                <div class="card-body">
                    {{ $todo->detail }}
                    <hr>
                    <strong>{{$todo->author}}</strong>
                    <p class="mb-0">Publish Date: {{Carbon\Carbon::parse($todo->date)->format('d M Y')}}</p>
                    <span class="btn btn-sm mt-3 btn-{{$todo->status == 0 ? 'warning' : 'success'}}">{{$todo->status == 0 ? 'Incomplete' : 'Complete'}}</span>
                </div>
                <div class="card-footer"><a href="{{route('edit', $todo->id)}}">Edit</a> <a href="{{route('delete',$todo->id)}}">Delete</a></div>
            </div>
        </div>

        @endforeach
    </div>

    <nav>
        {{$todos->links()}}
    </nav>
</div>


@endsection
