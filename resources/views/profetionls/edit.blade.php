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
                      <form class="login-form" method="POST" action="{{ url('/profetionls') }}/{{ $profetionls->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                      <h2>Create Category</h2>
                          <input type="text" id="name" name="name" value="{{ $profetionls->name }}" placeholder="Proferionl Name"/>

                          <select name="category_id" id="category_id">
                          <option>--Select Parent--</option>

                            @foreach($all_categories as $cat)
                              
                             
                            <option 
                                 @if($cat->id == $profetionls->category_id)
                                selected="selected"
                              @endif
                              value="{{ $cat->id }}">{{ $cat->name }}
                              </option>
                            @endforeach
                          </select>

                        <textarea name="description" id="description" cols="50" rows="5">{{ $profetionls->description }}</textarea>
                        
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