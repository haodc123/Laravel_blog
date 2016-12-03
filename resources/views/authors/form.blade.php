@include('shared.alert')
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'btn btn-primary']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}