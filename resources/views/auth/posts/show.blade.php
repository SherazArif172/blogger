@extends('layouts.auth')


@section('title', 'View Post')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<link href="{{ asset("assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css") }}" rel="stylesheet" />


@endsection
@section('content')
<div class="content">
    <!-- For Components documentaion -->
    <!-- Masked Input -->
    <div class="card card-default">
      <div class="card-header">
        <h2>View Post</h2>
      </div>

      @if (Session::has('alert success'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ Session::get('alert success') }}
      </div>

      @endif

      <div class="card-body">
        @if ($post)
        <table class="table" id="posts">
            <tbody>
              <tr>
                <th scope="col">Title</th>
                <td>{{ $post->title }}</td>
                </tr>

                <tr><th scope="col">DESCRIPTION</th>
                    <td>{{ ($post->description) }}</td>
                </tr>



                <tr>
                    <th scope="col">CATEGORY</th>
                <td>{{ $post->category->name }}</td>
                </tr>


                <tr>
                    <th scope="col">USERNAME</th>
                <td>{{ $post->user->name }}</td>

                </tr>

                <tr>
                    <th scope="col">STATUS</th>
                <td>{{ $post->status==1?'Active':'InActive' }}</td>
                </tr>


            </tbody>

          </table>
        @else
        <h3 class="text-center text-danger">No Post Found</h3>
        @endif

  </div>
</div>
</div>

@endsection



