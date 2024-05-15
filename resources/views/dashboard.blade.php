@extends('layouts.app')
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-action')

    <a href="{{route('profile.edit')}}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text"><i class="mdi mdi-plus-circle"></i>Add New</a>
@endsection
@section('content')

    <div class="header-right flex-wrap mt-2 mt-sm-0">
        <div class=" align-items-center">
            <p><strong>Profile information</strong></p>
            <p>Update your profile account information</p>
        </div>

</div>

@endsection

