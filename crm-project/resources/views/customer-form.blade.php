
@extends('layouts.layout')
@section('content')

<section class="content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="container">
                        <div class="form-outline mt-5">
                            <div class="form-wrapper">
                                <h1 class=" text-center form-title fs-1 text-white">Add customer</h1>
                                <form method="POST" action="{{ url('/add-customer') }}">
                                @csrf
                                     <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="name" placeholder="name@example.com" name="name">
                                        <label for="name">name</label>
                                      </div>
                                      <x-input-error :messages="$errors->get('name')" class="mt-2 error" />
                                      <div class="form-floating mb-3 mt-3">
                                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                                        <label for="email">Email </label>
                                      </div>
                                      <x-input-error :messages="$errors->get('email')" class="mt-2 error" />

                                      <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control" id="phone" placeholder="name@example.com" name="phone">
                                        <label for="phone">Phone</label>
                                      </div>
                                      <x-input-error :messages="$errors->get('phone')" class="mt-2 error" />

                                      <label for="address" class="text-warning fw-bold fs-5">Address</label>
                                      <div class="form-floating mb-3 mt-3">
                                        <textarea class="form-control" id="address" placeholder="name@example.com" name="address"></textarea>
                                      </div>
                                      <x-input-error :messages="$errors->get('address')" class="mt-2 error" />
                                      <label for="address" class="text-warning fw-bold fs-5">Groupe</label>

                                      <div class="form-floating mb-3 mt-3">
                                        <select name="group" id="">
                                            <option value="" selected>Select</option>
                                            <option value="VIP">VIP</option>
                                            <option value="Company">Company</option>
                                            <option value="Individual">Individual</option>
                                        </select>
                                      </div>
                                      <x-input-error :messages="$errors->get('group')" class="mt-2 error" />
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

