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
                      <form class="login-form" method="POST" action="{{ url('/categories') }}/{{ $category->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                      <h2>Create Category</h2>
                          <input type="text" id="name" name="name" value="{{ $category->name }}" placeholder="Category Name"/>

                          <select name="parent_id" id="parent_id">
                          <option value="0">--Select Parent--</option>

                            @foreach($all_categories as $cat)
                              
                             
                            <option 
                                 @if($cat->id == $category->parent_id)
                                selected="selected"
                              @endif
                              value="{{ $cat->id }}">{{ $cat->name }}
                              </option>
                            @endforeach
                          </select>

                        <textarea name="description" id="description" cols="50" rows="5">{{ $category->description }}</textarea>
                        
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