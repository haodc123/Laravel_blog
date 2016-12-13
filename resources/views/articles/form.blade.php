@include('shared.alert')
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textArea('content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('custom', 'Custom (not in db):') !!}
    {!! Form::text('custom', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('author_id', 'Author:') !!}
    {!! Form::select('author_id', $authors, $article->author_id, ['class' => 'form-control']) !!}
</div>
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}