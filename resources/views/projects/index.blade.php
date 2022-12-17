@extends('layouts.app')
@section('content')
     <header class="d-flex justify-content-between ">
          <div class="h6 text-dark">
               <a href="/projects">Projects</a>
          </div>
          <div>
               <a href="/projects/create" class="btn btn-primary px-4">New Project</a>
          </div>
     </header>

     <section>
          <div class="row">
               @forelse($projects as $project)
                    <div class="col-4 mb-4">
                         <div class="card" style="height: 230px">
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
                                             <a style="text-decoration: none" href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                                        </h5>
                                        <div class="card-text mt-4">
                                             {{ Str::limit($project->description, 150, '...')  }}
                                        </div>

                                   </div>
                              </div>
                              @include('projects.footer')
                         </div>
                    </div>
                    @empty
                         <div class="m-auto align-content-center text-center">
                              <p>There are no any projects.</p>
                              <div class="mt-5">
                                   <a href="/projects/create"
                                        class="btn btn-primary btn-lg d-inline-flex align-items-center">Create New Project</a>
                              </div>
                         </div>
                    @endforelse
               </div>
          </section>
     @endsection
