
@extends($vlayout)
 
@section('title', 'Authors create')

@section('content')

{!! Form::open(['route' => 'authors.store', 'data-remote' => $vremote]) !!}
    @include ('authors.form', ['submitButtonText' => 'Add Author'])
{!! Form::close() !!}

@endsection