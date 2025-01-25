
@extends('layouts.layout')
@section('content')

<section class="content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="container">
                        <div class="form-outline mt-5">
                            <div class="form-wrapper">
                                <h1 class=" text-center form-title fs-1 text-white">Login</h1>
                                <form method="POST" action="{{ route('login') }}">
                                @csrf

                                      <div class="form-floating mb-3 mt-3">
                                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                                        <label for="email">Email address</label>
                                      </div>
                                      <x-input-error :messages="$errors->get('email')" class="mt-2 error" />

                                      <div class="form-floating mb-3 mt-3">
                                        <input type="password" class="form-control" id="password" placeholder="name@example.com" name="password">
                                        <label for="password">Password</label>
                                      </div>
                                      <x-input-error :messages="$errors->get('password')" class="mt-2 error" />


                                     <div class="mt-4 text-center ">
                                        <button type="submit" class="btn btn-warning text-white submit-btn">Submit</button>
                                     </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
@endsection

