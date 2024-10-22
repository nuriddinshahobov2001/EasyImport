@extends('layouts.app')

@section('title')
Дашбоард
@endsection

@section('css-links')
{{auth()->user()->roles}}
@endsection

@section('main')
@endsection

@section('js-links')
@endsection
