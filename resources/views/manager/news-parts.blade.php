@section('newsForm')
<form action="/news"
    method="POST"
    enctype="multipart/form-data"
    class="col-lg-6 offset-lg-3 ">
    @csrf
    <div class="row justify-content-center">

    <div class="form-outline mb-4">
        <input name="title" type="text" id="formTitle" class="form-control" required />
        <label class="form-label" for="formTitle">Title</label>
    </div>

    <div class="form-outline mb-4">
        <textarea name="description" class="form-control" id="formDescription" rows="4" required></textarea>
        <label class="form-label" for="formDescription">Description</label>
    </div>

    <div class="form-outline mb-4">
        <label for="formCategory">Category</label>
        <select name="category" class="form-control" id="formCategory" required>
        @foreach ($categories as $category)
            <option type="number"  value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input name="image" class="form-control" type="file" id="formFile">
        </div>

    <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
    </div>
</form>
@endsection

@section('newsTable')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        News list
    </div>
    <div class="card-body">
        <table id="datatablesSimpleNews">
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
                    <th>{{ substr($singleNews->description,0,50) }}</th>
                    <th>{{ date('jS M Y',$singleNews->created) }}</th>
                    <th>{{ $singleNews->category->title }}</th>
                    <th><a href="/news/{{ $singleNews->slug }}/edit" type="button" class="btn btn-warning">Edit</a></th>
                    <th>
                        <form method="POST" action="/news/{{$singleNews->slug}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                    
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger delete-user" value="Delete">
                            </div>
                        </form>
                    </th>
                </tr>
                @endforeach
                <tr>
            </tbody>
        </table>
    </div>
</div>
@endsection