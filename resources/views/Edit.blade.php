@extends('layouts.Frontend')
@section('topheader', 'Edit Todo')

@section('content')
    <div class="col-lg-5 mx-auto">
        <div class="card mt-5 ">
            <div class="card-header">Edit Todo</div>
            <div class="card-body">
                <form action="{{route('update', $todo->id)}}" method="POST">
                    @csrf
                    <input name='title' type="text" class="form-control my-2 @error('title') is-invalid @enderror" placeholder="Todo Title" value="{{ $todo->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                    <textarea name="detail" placeholder="Todo Detail" class="my-2 form-control @error('detail') is-invalid @enderror" value="">{{ $todo->detail }}</textarea>
                    @error('detail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name='author' class="form-control my-2 @error('author') is-invalid @enderror" placeholder="Author" value="{{ $todo->author }}">
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <label for="">Published Date</label>
                    <input type="date" name='date' class="form-control my-2 @error('date') is-invalid @enderror" value="{{ $todo->date }}">
                    @error('date')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                    <button class="btn w-100 btn-primary">Update Todo</button>
                </form>
            </div>
        </div>
    </div>
@endsection
