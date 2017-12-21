@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="col-md-4">
                    @include('admin.left_menu')
                </div>

                <div class="panel-body">
                    <div class="login-section register-section">
                    <div class="login-page">
                      <div class="form">
                      <form class="login-form" method="POST" action="{{ url('/categories')}}">
                        {{ csrf_field() }}
                      <h2>Create Category</h2>
                          <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Category Name" required />

                          <select name="parent_id" id="parent_id">
                          <option value="0">--Select Parent--</option>
                            @foreach($all_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>

                        <textarea name="description" id="description" cols="50" rows="5"></textarea>
                        
                          <button type="submit">Save</button>
                        
                        </form>
                      </div>
                      </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection