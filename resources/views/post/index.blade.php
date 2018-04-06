@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	    	@foreach($posts as $post)				

	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">{{$post->title}} 
	                	<div class="text-right">
	                		<a href="{{ route('post.edit',$post->id) }}" class="btn btn-success btn-sm btn-inline">Edit</a> | 
	                		<form class="d-inline" method="POST" action=" {{ route('post.destroy',$post->id) }} ">
	                		{{ csrf_field() }}
							{{ method_field('DELETE') }}	
	                			<button type="submit" class="btn btn-danger btn-sm btn-inline">Delete</button>
	                		</form>
	                	</div>
	                </div>

						<div class="panel-body">
							{{$post->content}}
						</div>
	            </div>
	        </div>

	        @endforeach
	    </div>
	</div>
	
@endsection