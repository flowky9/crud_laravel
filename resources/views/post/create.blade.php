@extends('layouts.app')

@section('content')
	<div class="container">
		<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="">Title</label>
				<input type="text" name="title" class="form-control">
				@if ($errors->has('title'))
				    <div class="text-danger">
				           {{ $errors->first('title') }}

				    </div>
				@endif
			</div>
			<div class="form-group">
				<label for="">Category</label>
				<select class="form-control" name="category" id="">

					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach	
				</select>
			</div>
			<div class="form-group">
				<label for="">Content</label>
				<textarea name="content" id="" cols="30" rows="5" class="form-control"></textarea>
				@if ($errors->has('content'))
				    <div class="text-danger">

				           {{ $errors->first('content') }}

				    </div>
				@endif
			</div>
			<div class="form-group">
				<label for="">Image</label>
				<div class="panel">
					<div class="panel-body">
						<input type="file" name="img" class="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Save">
			</div>		
		</form>
		@if (app('request')->input('status') == 'success')
			<h3>{{ "Berhasil tambah post" }}</h3>
		@endif
	</div>
@endsection