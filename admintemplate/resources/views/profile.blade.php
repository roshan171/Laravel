@extends('layouts.app')

@section('title','profile')

@section('contents')
<h1 class="mb-0">Profile</h1>
<hr />

<form action="" method="post" enctype="mulitpart/form-data" id="profile_setup_frm">
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="text-right">Profile Settings</h5>
</div>
<div class="row" id="res"></div>
<div class="row mt-2">
<div class="col-md-6">
    <label for="labels">Name:</label>
    <input type="text" name="name" class="form-group" placeholder="first Name" value="{{auth()->user()->name}}">
</div>
<div class="col-md-6">
    <label for="labels">Email:</label>
    <input type="text" name="email" class="form-group" placeholder="Email" value="{{auth()->user()->email}}">
</div>
</div>

<div class="row mt-2">
<div class="col-md-6">
    <label for="labels">Phone:</label>
    <input type="text" name="phone" class="form-group" placeholder="Phone" value="{{auth()->user()->phone}}">
</div>
<div class="col-md-6">
    <label for="labels">Address:</label>
    <input type="text" name="address" class="form-group" placeholder="Address" value="{{auth()->user()->address}}">
</div>
</div>
<div class="mt-5 text-right">
    <button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button>
</div>
            </div>
        </div>
    </div>
</form>
@endsection