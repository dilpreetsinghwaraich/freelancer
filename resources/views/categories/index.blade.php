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
                    <div class="row">
					<div class="col-md-6 col-md-offset-3">
					<h1>All Categories</h1>
					<span><a href="{{ url('/categories/create') }}">Add</a></span>
					<table class="table">
						<tr>
							<th>Name</th>
							<th>Description</th>
							
						</tr>

						@foreach($all_categories as $cat)
							<tr>
								<td><a href="{{ url('/categories')}}/{{ $cat->id }}/edit">{{ $cat->name }}</a></td>
								<td>{{ $cat->description }}</td>
								<td>
								<form method="POST" action="{{ url('/categories')}}/{{ $cat->id }}">

									{{ csrf_field() }}
									{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger btn-sm">Delete</button>
									
									</form>	
								</td>
							</tr>
						@endforeach
					</table>
					</div>
				</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection