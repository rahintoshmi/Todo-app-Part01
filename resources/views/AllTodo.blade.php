@extends('layouts.Frontend')
@section('topheader', 'All Todos')
@php
    use Carbon\Carbon;
@endphp
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
                    <p class="mb-0">Publish Date: {{Carbon::parse($todo->date)->format('d M Y')}}</p>
                    <span class="btn btn-sm mt-3 btn-{{$todo->status == 0 ? 'warning' : 'success'}}">{{$todo->status == 0 ? 'Incomplete' : 'Complete'}}</span>
                </div>
                <div class="card-footer"><a href="{{route('edit', $todo->id)}}">Edit</a> <a href="{{route('delete',$todo->id)}}">Delete</a>
                
                 @if($todo->status == 1 && Carbon::parse($todo->date) <= Carbon::today())
                   <span class="badge bg-success">Completed</span>

                 @elseif($todo->status == 0 && Carbon::parse($todo->date) > Carbon::today())
                   <span class="badge bg-secondary">Not Published Yet</span>

                 @elseif($todo->status == 0 && Carbon::parse($todo->date) <= Carbon::today())
                    <a href="{{ route('status', $todo->id) }}" class="btn btn-sm btn-warning">Mark as Complete</a>
                @endif


                </div>
            </div>
        </div>

        @endforeach
    </div>

    <nav>
        {{$todos->links()}}
    </nav>
</div>


@endsection
