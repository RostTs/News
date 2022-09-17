@extends('layouts.app')
@include('manager.category-parts')
@include('manager.news-parts')
@section('content')
    <div class="container mt-5">
                <div>
                        <div class="container">
                            <div class="text-center my-5">
                                <p class="lead mb-0">Form for creating new news</p>
                                @if ($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p class="text-danger mb-1">{{$error}}</p>
                                    @endforeach
                                @endif
                                @if (session()->has('message'))
                                    <p class="text-success mb-1">{{  session()->get('message')  }}</p>
                                @endif
                                @if (session()->has('customError'))
                                    <p class="text-danger mb-1">{{  session()->get('customError')  }}</p>
                                @endif
                            </div>
                        </div>
                            @yield('newsForm')
                            @yield('categoryForm')
                        </div>
                        @yield('newsTable')
                        @yield('categoryTable')
    </div>
@endsection