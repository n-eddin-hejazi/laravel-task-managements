@extends('layouts.app')
@section('title', 'Profile ' . auth()->user()->name)
@section('content')

     <div class="row">
          <div class="col-md-6 mx-auto">
               <div class="card p-1">
                    <div class="text-center mt-5">

                         <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Photo" width="82"
                              height="82">
                         <h3 class="mt-3">{{ auth()->user()->name }}</h3>
                    </div>
                    <div class="card-body">
                         <form action="/profile" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PATCH')
                              <div class="form-group mb-3">
                                   <label for="name" class="mb-2">Name</label>
                                   <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                        id="name" name="name">
                                        @error('name')
                                        <div class="text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                     @enderror
                              </div>

                              <div class="form-group mb-3">
                                   <label for="email" class="mb-2">Email</label>
                                   <input type="email" class="form-control" value="{{ auth()->user()->email }}"
                                        id="email" name="email">
                                        @error('email')
                                        <div class="text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                     @enderror
                              </div>

                              <div class="form-group mb-3">
                                   <label for="password" class="mb-2">Password</label>
                                   <input type="password" class="form-control" id="password" name="password">
                                   @error('password')
                                   <div class="text-danger">
                                       <small>{{ $message }}</small>
                                   </div>
                                @enderror
                              </div>

                              <div class="form-group mb-3">
                                   <label for="password-confirmation" class="mb-2">Password Confirmation</label>
                                   <input type="password" class="form-control" id="password-confirmation"
                                        name="password-confirmation">
                                        @error('password-confirmation')
                                        <div class="text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                     @enderror
                              </div>

                              <div class="form-group mb-3">
                                    <label for="image" class="form-label mb-2">Image</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                    @error('image')
                                    <div class="text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                 @enderror
                              </div>


                              <div class="form-group d-flex mt-5">
                                   <button type="submit" class="btn btn-primary">Save</button>
                                   <button type="submit" form="logout" class="btn btn-light mx-3">Logout</button>
                              </div>
                         </form>

                         <form action="/logout" method="POST" id="logout">
                              @csrf
                         </form>
                    </div>
               </div>
          </div>
     </div>
@endsection
