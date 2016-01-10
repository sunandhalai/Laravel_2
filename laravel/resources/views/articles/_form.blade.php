
<div class="form-group">
    {!! Form::label('title', 'Article Title: ') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Article Image: ') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Article Body: ') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags: ') !!}
    {!! Form::select('tag_list[]', $tag_list, null, ['multiple', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish on') !!}
    {!! Form::date('published_at', \Carbon\Carbon::now()->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::button($submitButtonText, ['class'=>'form-control btn btn-primary', 'type' => 'submit']) !!}
</div>