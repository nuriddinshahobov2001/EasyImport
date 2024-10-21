@extends('layouts.app')

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
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Kitob</b>TJ</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Введите логин и пароль</p>
                <x-alerts/>
                <x-form method="POST" action="{{ route('login') }}" :multipart="false">
                    @csrf
                    <x-input type="email" name="email" placeholder="Enter your Email" icon="fas fa-envelope" :showIcon="true" :required="true"/>
                    <x-input type="password" name="password" placeholder="Enter your password" icon="fas fa-lock" :showIcon="true" :required="true"/>
                    <x-button type="submit" class="btn btn-primary" text="Вход" position="end"/>
                </x-form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection


@section('js-scripts')
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
@endsection
