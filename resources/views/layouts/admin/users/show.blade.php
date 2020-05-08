@extends('layouts.admin.master.index')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Utilizador

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Utilizadores</a></li>
            <li class="active"></li>
        </ol>
    </section>

    @include('flash-message')

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{$user->avatar}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{$user->email}}</p>

                        <div class="pull-right box-tools">
                            <a href="/admin/users/{{$user->id}}/edit"><button type="button" class="btn btn-info btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-edit"></i></button></a>&nbsp;
                            <a href="/admin/users/{{$user->id}}"><button type="Submit" form="delete" class="btn btn-danger btn-sm" data-widget="" data-toggle="tooltip" title=""><i class="fa fa-trash-o"></i></button></a>

                            <form method="POST" id="delete" action="/admin/users/{{$user->id}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


</div>

@endsection
