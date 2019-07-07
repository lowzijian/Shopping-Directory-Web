@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Category</h1>
    
        <div class="panel-body">
            <!-- New Category Form -->
            {!! Form::model($category, [
            'route' => ['category.update', $category->id],
            'method' => 'put',
            'class' => 'form-horizontal'
            ]) !!}

                <!-- Name -->
                <div class="form-group row">
                    {!! Form::label('category-name', 'Name', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::text('name', $category->name, [
                        'id' => 'category-name',
                        'class' => 'form-control',
                        'maxlength' => 100,
                        'required',
                        ]) !!}
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group row">
                    {!! Form::label('category-description', 'Description', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('description', $category->description, [
                        'id' => 'category-description',
                        'class' => 'form-control noresize',
                        'style' => 'resize:vertical; min-height:250px',
                        ]) !!}
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-8">
                        {!! Form::button('Update', [
                        'type' => 'submit',
                        'class' => 'btn btn-primary',
                        ]) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
