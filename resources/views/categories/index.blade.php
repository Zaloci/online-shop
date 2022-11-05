@extends('backend.layout')

@section('content')

 <div class="row mt-3">
            <div class="col-sm-12 col-md-8">
                <h2 class="text-primary">List Categories</h2>
            </div>
            <div class="col-sm-12 col-md-4">
                <a href="{{ route('categories.create')}}" class="btn btn-outline-primary float-end">Add Category</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mt-2">
            <thead class="bg-primary text-white d-flex-inline">
              <tr>
                <th scope="col" width="2%">No</th>
                <th scope="col" width="70%">Name</th>
                <th scope="col" width="13%">Picture</th>
                <th scope="col" width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                  <th scope="row">{{$category->id}}</th>
                  <td>{{$category->nama}}</td>
                  <td><img src="{{ asset('uploads/' . $category->gambar) }}" alt="" class="img-thumbnail" width="100px"></td>
                  <td class="d-flex justify-content-end p-5">

                    <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary mx-2">Delete</button>
                    </form>

                    <form action="{{ route('categories.edit', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-secondary">Edit</button>
                    </form>

                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>

@endsection

