@section('categoryForm')
<div class="container">
    <div class="text-center my-5">
        <p class="lead mb-0">Form for creating new categories</p>
    </div>
</div>
<form action="/categories"
    method="POST"
    enctype="multipart/form-data"
    class="col-lg-6 offset-lg-3 ">
    @csrf
  <div class="row justify-content-center">

    <div class="form-outline mb-4">
        <input name="title" type="text" id="formTitle" class="form-control" required />
        <label class="form-label" for="formTitle">Title</label>
    </div>
    <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
  </div>
</form>
@endsection

@section('categoryTable')
<div class="row">
  <div class="col-3"></div>
<div class="card mb-4 col-6">
  <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Categories list
  </div>
  <div class="card-body">
      <table id="datatablesSimpleCategories">
          <thead>
              <tr>
                  <th>Title</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                  <th>Title</th>
                  <th>Delete</th>
              </tr>
          </tfoot>
          <tbody>
              @foreach ($categories as $category)
              <tr>
                  <th>{{ $category->title }}</th>
                  <th>
                      <form method="POST" action="/categories/{{$category->id}}">
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
<div class="col-3"></div>
</div>

@endsection