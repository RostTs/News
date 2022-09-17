@extends('layouts.app')

@section('content')
      <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to News Home!</h1>
                <p class="lead mb-0">Here you can stay up to date with the latest news</p>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ date('jS M Y',$news[0]->created) }}</div>
                        <a href="/news/{{ $news[0]->slug }}"><h2 class="card-title">{{ $news[0]->title }}</h2></a>
                        <span class="card-subtitle h5">Category: 
                            <span class="card-subtitle h5 text-primary">{{ $news[0]->category->title }}</span>
                        </span>
                        <p class="card-text">{{ substr($news[0]->description,0,100) }}</p>
                    </div>
                </div>

                <div class="row">
                    @for ($newsNumber = 1; $newsNumber < count($news); $newsNumber++)
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ date('jS M Y',$news[$newsNumber]->created) }}</div>
                                    <a href="/news/{{ $news[$newsNumber]->slug }}"><h2 class="card-title h4">{{ $news[$newsNumber]->title }}</h2></a>
                                    <span class="card-subtitle h5">Category: 
                                        <span class="card-subtitle h5 text-primary">{{ $news[$newsNumber]->category->title }}</span>
                                    </span>
                                    <p class="card-text">{{ $news[$newsNumber]->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="/news?category={{$category->title}}">{{$category->title}}</a></li>
                                    </ul>
                                </div>    
                            @endforeach
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="/news">all</a></li>
                                </ul>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection