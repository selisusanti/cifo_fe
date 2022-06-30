@extends('layouts.simple')
@section('title', 'Profile')
@section('content')

<section class="profile">
    <div class="content">
        <!-- Simple -->
        <h4 style="color: #707070; !important;">MY PROFILE</h4>
        <div class="block block-rounded block-bordered text-center">
            <div class="block-content">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <img class="img-avatar img-avatar96" src="{{ asset('/media/errors/404/notset.png') }}" alt="">
                    <div class="col-2 text-center ">
                        <p class="font-w600 mb-0">Name</p>
                        <p class="font-size-sm font-italic text-muted mb-0">
                            {{$data->data->name ?? '-' }}
                        </p>
                    </div>
                    <div class="col-2 text-center ">
                        <p class="font-w600 mb-0">Email</p>
                        <p class="font-size-sm font-italic text-muted mb-0">
                            {{$data->data->email ?? '' }}
                        </p>
                    </div>
                    <div class="col-2 text-center ">
                        <p class="font-w600 mb-0">Phone</p>
                        <p class="font-size-sm font-italic text-muted mb-0">
                            {{$data->data->phone ?? '-' }}
                        </p>
                    </div>
                    <div class="col-2 text-right">
                        <a href="/profile/view-changepassword">
                            <button type="button" data-toggle="modal" data-target="#profile-update-modal" class="btn btn-sm btn-outline-primary text-right">
                                <i class="fa fa-fw fa-user-cog mr-1"></i> Edit Password
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>   

    </div>

</section>
@endsection