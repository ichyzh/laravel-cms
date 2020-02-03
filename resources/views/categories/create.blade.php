@extends('layouts.app');

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit category' : 'Create category' }}
        </div>
        @include('partials.errors')
        <div class="card-body">
            <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ isset($category) ? $category->name : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">
                        {{ isset($category) ? 'Edit category' : 'Add category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    
@endsection