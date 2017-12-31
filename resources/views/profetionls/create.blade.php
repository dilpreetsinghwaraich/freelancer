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
                      <form class="login-form" method="POST" action="{{ url('/profetionls') }}">
                        {{ csrf_field() }}
                      <h2>Create Category</h2>
                          <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Skill Name" required />

                          <select name="category_id" id="category_id" required>
                          <option value="">--Select Category--</option>
                            @foreach($all_categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>

                        <textarea name="description" id="description" cols="50" rows="5" placeholder="Description"></textarea>
                        
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