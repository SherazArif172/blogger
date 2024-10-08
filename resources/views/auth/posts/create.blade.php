@extends('layouts.auth')

@section('styles')

<link rel="stylesheet" href="{{ asset('assets/auth/css/multi-drop-down.css') }}">

@endsection

@section('content') <div class="content-wrapper">




    <div class="content">
      <!-- For Components documentaion -->
      <!-- Masked Input -->
      <div class="card card-default">
        <div class="card-header">
          <h2>Create Post</h2>
        </div>



        <div class="card-body">
            <form method="post" action="{{ route('posts.store') }}">
                @csrf
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('title') }} " name='title' placeholder='title'>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" id="" class="form-control" cols="30" rows="3" placeholder="Description" style="resize: none"></textarea>
             </div>
            <div class="form-group">
                <label for="">Is Publish</label>
              <select name="status" class="form-control">
                <option value="" disabled selected>Choose Options</option>
                <option value="1">Publish</option>
                <option value="0">Draft</option>
              </select>
             </div>
            <div class="form-group">
                <label for="">Category</label>
              <select name="category" class="form-control">
                <option value="" disabled selected>Choose Options</option>
                @if($categories->count() > 0)
                @foreach ($categories as $category )
                <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @endif
              </select>
             </div>
            <div class="form-group">
                <label for="">Tags</label>
              <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                <option value="" disabled selected>Choose Options</option>
                @if($tags->count() > 0)
                @foreach ($tags as $tag )
                <option class=""  value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
                @endif
              </select>
             </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form></div>
      </div>
    </div> @endsection


    @section('scripts')

    <script src="{{ asset('assets/auth/js/multi-dropdown.js') }}" ></script>

    @endsection
