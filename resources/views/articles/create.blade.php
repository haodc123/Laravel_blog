
@extends($vlayout)
 
@section('title', 'Articles create')

@section('content')

	{!! Form::open(['route' => 'articles.store', 'data-remote' => $vremote]) !!}
		@include ('articles.form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}

@endsection