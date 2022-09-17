@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="text-center my-5">
                    @if (session()->has('message'))
                        <p class="text-success mb-1">{{  session()->get('message')  }}</p>
                    @endif
                </div>
            </div>
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1">Welcome</h1>
                    <div class="text-muted fst-italic mb-2">Posted on {{ date('jS M Y',$news->created) }}</div>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#">{{ $news->category->title }}</a>
                </header>
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                <section class="mb-5">
                    <a href="/news/{{ $news->slug }}"><h2 class="card-title">{{ $news->title }}</h2></a>
                    <p class="fs-5 mb-4">{{ $news->description }}</p>
                </section>
            </article>
        </div>
 
    </div>
</div>
@endsection