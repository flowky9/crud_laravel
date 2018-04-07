@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	    					

	        <div class="col-md-8 col-md-offset-2">
	        	@foreach($posts as $post)
	            <div class="panel panel-default">
	                <div class="panel-heading">{{$post->title}} <em class="text-small">{{ $post->created_at->diffForHumans() }}</em>
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
	             @endforeach

	         <!-- Custom pagination -->
	         @include('pagination.default', ['paginator' => $posts])
	        </div>

	       
	        
	    </div>

	</div>
	
@endsection