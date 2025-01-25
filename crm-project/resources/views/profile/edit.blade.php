
@extends('layouts.layout')
@section('content')
    <h1 class="text-white text-center mt-3">User Profile</h1>
    <div class="container mt-5">
        <div class="row p-5 d-flex justify-content-center gap-1">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3 user-profile p-5">
            @include('profile.partials.update-profile-information-form')

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3 user-profile p-5">
            @include('profile.partials.update-password-form')

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-3 user-profile p-5">
            @include('profile.partials.delete-user-form')

            </div>
        </div>
    </div>
@endsection

