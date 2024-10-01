@extends('layouts.auth') @section('content') <div class="content-wrapper">
    <div class="content">
      <!-- For Components documentaion -->
      <!-- Masked Input -->
      <div class="card card-default">
        <div class="card-header">
          <h2>Create Post</h2>
          <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-input-musk" role="button" aria-expanded="false" aria-controls="collapse-input-musk"></a>
        </div>
        <div class="card-body"><form>
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('title') }} " placeholder='title'>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" id="" class="form-control" cols="30" rows="3" placeholder="Description" style="resize: none"></textarea>
             </div>
            <div class="form-group">
                <label for="">Is Publish</label>
              <select name="is_publish" class="form-control">
                <option value="" disabled selected>Choose Options</option>
                <option value="1">Publish</option>
                <option value="0">Draft</option>
              </select>
             </div>
            <div class="form-group">
                <label for="">Category</label>
              <select name="is_publish" class="form-control">
                <option value="" disabled selected>Choose Options</option>
                @if($categories->count() > 0)
                @foreach ($categories as $category )
                <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                @endif
              </select>
             </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form></div>
      </div>
    </div> @endsection
