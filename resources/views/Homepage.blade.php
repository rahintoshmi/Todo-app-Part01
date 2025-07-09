@extends('layouts.Frontend')
@section('topheader', 'Homepage')

@section('content')
    <div class="col-lg-5 mx-auto">
        <div class="card mt-5 ">
            <div class="card-header">Add Todo</div>
            <div class="card-body">
                <form action="{{route('store')}}" method="POST">
                    @csrf
                    <input name='title' type="text" class="form-control my-2 @error('title') is-invalid @enderror" placeholder="Todo Title" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                    <textarea name="detail" placeholder="Todo Detail" class="my-2 form-control @error('detail') is-invalid @enderror" value="{{ old('detail') }}"></textarea>
                    @error('detail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name='author' class="form-control my-2 @error('author') is-invalid @enderror" placeholder="Author" value="{{ old('author') }}">
                    @error('author')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br>
                    <label for="">Published Date</label>
                    <input type="date" name='date' class="form-control my-2 @error('date') is-invalid @enderror" value="{{ old('date') }}">
                    @error('date')
                    <span class="text-danger">{{ $message}}</span>
                    @enderror
                    <button class="btn w-100 btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
