@extends('layouts.auth')


@section('title', 'posts')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<link href="{{ asset("assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css") }}" rel="stylesheet" />

<style>
    .outer {
        display: flex;
justify-content: center;
align-items: center;
gap: 3px;
    }


</style>
@endsection
@section('content')
<div class="content">
    <!-- For Components documentaion -->
    <!-- Masked Input -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Create Post</h2>
      </div>

      @if (Session::has('alert success'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ Session::get('alert success') }}
      </div>

      @endif

      <div class="card-body">
        @if (count($posts)>0)
        <table class="table" id="posts">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">USERNAME</th>
                <th scope="col">STATUS</th>
                <th scope="col" class="text-center">ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <th>{{ $post->title }}</th>
                <th>{{ Str::limit($post->description,15) }}</th>
                <th>{{ $post->category->name }}</th>
                <th>{{ $post->user->name }}</th>
                <th>{{ $post->status==1?'Active':'InActive' }}</th>
                <th class="outer">
                    <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-success inner"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-info inner"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>
                            <a class="btn btn-sm btn-danger inner"><i class="fas fa-trash"></i></a>
                        </button>
                    </form>
               </th>

              </tr>
              @endforeach
            </tbody>
          </table>
        @else
        <h3 class="text-center text-danger">No Post Found</h3>
        @endif

  </div>
</div>
</div>

@endsection


@section('scripts')
<script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#posts').DataTable({"bLengthChange": false,});
    })
</script>
@endsection
