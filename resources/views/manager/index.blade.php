@extends('layouts.app')

@section('content')
<div class="container mt-5">
                <div>
                        <div class="container">
                            <div class="text-center my-5">
                                <p class="lead mb-0">From for creating new news</p>
                            </div>
                        </div>
                    <form class="col-lg-6 offset-lg-3 ">
                        <div class="row justify-content-center">

                        <div class="form-outline mb-4">
                          <input type="text" id="formTitle" class="form-control" />
                          <label class="form-label" for="formTitle">Title</label>
                        </div>
                      
                        <div class="form-outline mb-4">
                          <textarea class="form-control" id="formDescription" rows="4"></textarea>
                          <label class="form-label" for="formDescription">Description</label>
                        </div>
                      
                        <div class="form-outline mb-4">
                            <label for="formCategory">Category</label>
                            <select class="form-control" id="formCategory">
                            @foreach ($categories as $category)
                                <option>{{ $category->title }}</option>
                            @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
                    </div>
                      </form>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        News list
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($news as $singleNews)
                                <tr>
                                    <th>{{ $singleNews->title }}</th>
                                    <th>{{ $singleNews->description }}</th>
                                    <th>{{ date('jS M Y',strtotime($singleNews->created)) }}</th>
                                    <th>{{ $singleNews->category->title }}</th>
                                    <th><a href="/news/{{ $singleNews->edit }}" type="button" class="btn btn-warning">Edit</a></th>
                                    <th><a type="button" class="btn btn-danger">Delete</a></th>
                                </tr>
                                @endforeach
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
</div>
@endsection