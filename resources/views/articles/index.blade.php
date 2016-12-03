
@extends($vlayout)
 
@section('title', 'Articles index')

@section('content')
	@include('shared.alert')
	<h1>Articles</h1>
	{!! link_to_route('articles.create', 'New Articles', null, ['class' => 'btn btn-primary btn-lg', 'data-remote' => 'true']) !!}

	<table border="1">
		<tr>
			<th>Edit</th>
			<th>Delete</th>
			<th>Recommend</th>
			<th>Title</th>
			<th>Author</th>
		</tr>
		@foreach ($articles as $article)
			<tr>
				<th>{!! link_to_route('articles.edit', 'Edit', $article->id, ['class' => 'btn btn-default']) !!}</th>
				<th>
					{!! Form::open(['method'=>'DELETE', 'route'=>['articles.destroy', $article->id]]) !!}
						<button type="submit">Delete</button>
					{!! Form::close() !!}
				</th>
				<td>{!! link_to_route('articles.recommendations.create', 'Recommend', $article->id) !!}</td>
				<th>{!! link_to_route('articles.show', $article->title, $article->id) !!}</th>
				<th>{!! $article->author->name !!}</th>
			</tr>
		
		@endforeach
		
	</table>

@endsection
