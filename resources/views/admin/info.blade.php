@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

                        @if (Session::has('success'))
                        <div class="alert-box success">
                            <h2>{!! Session::get('success') !!}</h2>
                        </div>
                        @endif

                        <div class="secure">Upload form</div>
                        
                        @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
		        <strong>{{ $message }}</strong>
		</div>
		<img src="/images/{{ Session::get('path') }}">
		@endif

		<form action="{{ url('/admin/upload') }}" enctype="multipart/form-data" method="POST">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-12">
					<input type="file" name="avatar" />
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-success">Upload</button>
				</div>
			</div>
		</form>
                        
                        </div>
                    
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection