@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Edit Data</div>
					<div class="panel-body">
						<form action="{{ route('post.update',$post->id) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" name="title" class="form-control" value="{{ $post->title }}">
								@if ($errors->has('title'))
								    <div class="text-danger">
								           {{ $errors->first('title') }}

								    </div>
								@endif
							</div>
							<div class="form-group">
								<label for="">Category</label>
								<select class="form-control" name="category" id="">
									<option> - </option>
									@foreach ($categories as $category)
										<option 

											@<?php if ($category->id == $post->category_id): ?>
												selected="selected"
											<?php endif ?>

										 value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach	
								</select>
							</div>
							<div class="form-group">
								<label for="">Content</label>
								<textarea name="content" id="" cols="30" rows="5" class="form-control">
									{{ $post->content }}
								</textarea>
								@if ($errors->has('content'))
								    <div class="text-danger">

								           {{ $errors->first('content') }}

								    </div>
								@endif
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary" value="Save">
							</div>		
						</form>
						@if (app('request')->input('status') == 'success')
							<h3>{{ "Berhasil tambah post" }}</h3>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection