
@extends($vlayout)
 
@section('title', 'Authors index')

@section('content')
	@include('shared.alert')
	<h1>Authors</h1>
	{!! link_to_route('authors.create', 'New Author', null, ['class' => 'btn btn-primary btn-lg', 'data-remote' => 'true']) !!}
	<table border="1">
		<tr>
			<th>Edit</th>
			<th>Delete</th>
			<th>Name</th>
		</tr>
		@foreach ($authors as $author)
			<tr>
				<td>{!! link_to_route('authors.edit', 'Edit', $author->id, ['class' => 'btn btn-default']) !!}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'route' => ['authors.destroy', $author->id]]) !!}
						<button type="submit">Delete</button>
					{!! Form::close() !!}
				</td>
				<td>{!! link_to_route('authors.show', $author->name, $author->id) !!}</td>
			</tr>
		@endforeach
	</table>
        
        {{ $authors->links() }}
	
@endsection