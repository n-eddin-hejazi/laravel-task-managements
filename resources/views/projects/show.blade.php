@extends('layouts.app')
@section('title', $project->title)
@section('content')

     <header class="d-flex justify-content-between ">
          <div class="h6 text-dark">
               <a href="/projects">Projects / {{ $project->title }}</a>
          </div>
          <div>
               <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4">Edit Project</a>
          </div>
     </header>

     <section class="row mt-5">
          <div class="col-lg-4">
               {{-- Project Details --}}
               <div class="card">
                    <div class="card-body">

                         <div class="status">
                              @switch($project->status)
                                   @case('done')
                                        <span class="badge text-bg-success mb-2">done</span>
                                   @break

                                   @case('canceled')
                                        <span class="badge text-bg-danger mb-2">canceled</span>
                                   @break

                                   @default
                                        <span class="badge text-bg-info mb-2">pending</span>
                              @endswitch
                              <h5 class="font-weight-bold card-title">
                                   <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                              </h5>
                              <div class="card-text mt-4">
                                   {{ $project->description }}
                              </div>

                         </div>
                    </div>
                    @include('projects.footer')
               </div>
               <div class="card mt-4">
                    <div class="card-body">
                        <h5>Change the status or project</h5>
                         <form action="{{ route('projects.update', $project) }}" method="POST">
                              @csrf
                              @method('PATCH')

                              <select name="status" class="form-select" id="status" onchange="this.form.submit()">
                                   <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending
                                   </option>
                                   <option value="done" {{ $project->status == 'done' ? 'selected' : '' }}>Done</option>
                                   <option value="canceled" {{ $project->status == 'canceled' ? 'selected' : '' }}>Canceled
                                   </option>
                              </select>
                         </form>
                    </div>
               </div>
          </div>

          <div class="col-lg-8">
               @foreach ($project->tasks as $task)
                    <div class="card d-flex flex-row align-items-center p-3 mb-3">
                         <div class="{{ $task->done ? 'checked muted' : '' }}">
                              {{ $task->body }}
                         </div>

                         <div class="ms-auto">
                              <form action="/projects/{{ $task->project_id }}/tasks/{{ $task->id }}" method="POST">
                                   @csrf
                                   @method('PATCH')
                                   <input type="checkbox" name="done" {{ $task->done ? 'checked' : '' }} class="form-check-input ml-4"
                                        onchange="this.form.submit()">
                              </form>
                         </div>
                         <div class="d-flex align-items-center">
                            <form action="/projects/{{ $task->project_id }}/tasks/{{ $task->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="" class="btn-delete">
                            </form>
                        </div>

                    </div>
               @endforeach
               <div class="card mt-4 p-4">
                    <form action="/projects/{{ $project->id }}/tasks " method="POST" class="d-flex">
                         @csrf
                         <input type="text" name="body" class="form-control p-2 ml-2 border-0" style="border-radius: 0" placeholder="Create New Task">
                         <button type="submit" class="btn btn-primary">Create</button>
                    </form>
               </div>
          </div>
     </section>
@endsection
