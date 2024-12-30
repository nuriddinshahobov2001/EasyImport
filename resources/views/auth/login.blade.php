@extends('layouts.app')

@section('title')
    Вход
@endsection
@section('css-links')
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
@endsection

@section('auth')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="#" class="h1 text-success"><b>Easy</b>Import</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Введите логин и пароль</p>
                <x-alerts/>
                <x-form method="POST" action="{{ route('login') }}" :multipart="false">
                    @csrf
                    <x-input id="login" type="text" name="login" placeholder="Enter your Email or Login" icon="fas fa-envelope" :showIcon="true" label="" :required="true" :disabled="false"/>
                    <x-input id="password" type="password" name="password" placeholder="Enter your password" icon="fas fa-lock" :showIcon="true" label="" :required="true" :disabled="false"/>
                    <x-button type="submit" class="btn btn-primary" text="Вход" position="end"/>
                </x-form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection


@section('js-links')
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
@endsection
