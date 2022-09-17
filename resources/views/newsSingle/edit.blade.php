@extends('layouts.app')

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
                            </div>
                        </div>
      
                    <form action="/news/{{ $news->slug }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="col-lg-6 offset-lg-3 ">
                          @csrf
                          @method('PUT')
                          
                        <div class="row justify-content-center">

                        <div class="form-outline mb-4">
                          <input name="title" value="{{ $news->title }}" type="text" id="formTitle" class="form-control" required />
                          <label class="form-label" for="formTitle">Title</label>
                        </div>
                      
                        <div class="form-outline mb-4">
                          <textarea name="description"class="form-control" id="formDescription" rows="4" required>
                            {{ $news->description }}
                          </textarea>
                          <label class="form-label" for="formDescription">Description</label>
                        </div>
                      
                        <div class="form-outline mb-4">
                            <label for="formCategory">Category</label>
                            <select name="category" class="form-control" id="formCategory" required>
                            @foreach ($categories as $category)
                                @if ($category->id === $news->category->id)
                                <option type="number" selected value="{{ $category->id }}">{{ $category->title }}</option>
                                @else
                                <option type="number"  value="{{ $category->id }}">{{ $category->title }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                          </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                    </div>
                      </form>
                </div>
        </div>
@endsection