@extends('layouts.app')
@section('title', 'Edit ' . $project->title)
@section('content')
     <div class="row justtify-content-center">
          <div class="col-8 mx-auto">
               <div class="card p-4">
                    <h3 class="text-center pb-3 font-weight-bold">
                         New Project
                    </h3>
                    <form action="/projects/{{ $project->id }}" method="POST">
                         @csrf
                         @method('PATCH')
                         <div class="form-group mb-4">
                              <label for="title" class="mb-2">Project Title</label>
                              <input type="text" value="{{ old('title', $project->title) }}" class="form-control"
                                   id="title" placeholder="Title" name="title">
                              @error('title')
                                   <div class="text-danger">
                                        <small>{{ $message }}</small>
                                   </div>
                              @enderror
                         </div>
                         <div class="form-group mb-4">
                              <label for="description" class="mb-2">Project Description</label>
                              <textarea class="form-control" name="description" id="description" placeholder="Description" cols="30"
                                   rows="10">{{ old('title', $project->description) }}</textarea>
                              @error('description')
                                   <div class="text-danger">
                                        <small>{{ $message }}</small>
                                   </div>
                              @enderror
                         </div>
                         <div class="form-group mb-1">
                              <button type="submit" class="btn btn-primary">Edit</button>
                              <a href="/projects" class="btn btn-light mx-3">Cancel</a>
                         </div>
                    </form>
               </div>
          </div>
     </div>
@endsection
