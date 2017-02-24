@extends('admin.layout')

@section('title', '| AdminShowPost')

@section('content')

<div class="row">

		<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<dt>Url:</dt>
					<dd><a href="#">{{url($post->slug)}}</a></dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					@if (Auth::guard('admin')->user()->can('edit_post'))
						
						<div class="col-sm-6">
							{!! Html::linkRoute('admin.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>

					@endif	

					@if (Auth::guard('admin')->user()->can('delete_post'))	
					
						<div class="col-sm-6">
							{!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

							{!! Form::close() !!}
						</div>

					@endif

				</div>
				
				<div class="row">
					<div class="col-md-12" style="margin-top:15px;">
						{{Html::linkRoute('admin.posts.index','<< See all posts',

						[],['class'=>'btn btn-default btn-block'])}}
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection