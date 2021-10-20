@extends('layouts.panel')
@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/admin/detail.css')}}">
@endsection
@section('content')
<!-- Infor Employee -->


<div class="page-content page-container" id="page-content">

    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{url('img/users',$user->avatar)}}" width="100px"
                                        class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{$user->name}}</h6>
                                <p>{{$user->rolename}}</p> <i
                                    class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information Account Locked</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{$user->phone}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="text-muted f-w-400">{{$user->address}}</h6>
                                    </div>

                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">User Account</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Role Name</p>
                                        <h6 class="text-muted f-w-400">{{$user->rolename}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Date Join</p>
                                        <h6 class="text-muted f-w-400">{{$user->created_at}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Status Active</p>
                                        <h6 class="text-muted f-w-400">{{$user->active}}</h6>
                                    </div>
                                </div>
                                <div class="p-2 text-right">
                                    <a href="{{ route('accounts-locked.index') }}" class="badge badge-primary"> Back </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
