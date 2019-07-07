<?php
    use App\Zone;
    use App\Category;
?>
@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Tenant</h1>
    
        <div class="panel-body">
            <!-- New Tenant Form -->
            {!! Form::model($tenant, [
            'route' => ['tenant.update', $tenant->id],
            'method' => 'put',
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
            ]) !!}

                <!-- Name -->
                <div class="form-group row">
                    {!! Form::label('tenant-shopName', 'Name', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::text('shopName', $tenant->shopName, [
                        'id' => 'tenant-shopName',
                        'class' => 'form-control',
                        'maxlength' => 100,
                        'required',
                        ]) !!}
                    </div>
                </div>

                <!-- Lot No. -->
                <div class="form-group row">
                    {!! Form::label('tenant-lotNo', 'Lot No.', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::text('lotNo', $tenant->lotNo, [
                        'id' => 'tenant-lotNo',
                        'class' => 'form-control',
                        'minlength' => 6,
                        'maxlength' => 6,
                        'required',
                        ]) !!}
                    </div>
                </div>

                <!-- Floor -->
                <div class="form-group row">
                    {!! Form::label('tenant-floor', 'Floor', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::number('floor', $tenant->floor, [
                        'id' => 'tenant-floor',
                        'class' => 'form-control',
                        'maxlength' => 10,
                        'required',
                        ]) !!}
                    </div>
                </div>

                <!-- Zone -->
                <div class="form-group row">
                    {!! Form::label('tenant-zone-id', 'Zone', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::select(
                        'zone_id', 
                        Zone::pluck('name', 'id'), $tenant->Zone->id, [
                        'id' => 'tenant-zone-id',
                        'class' => 'form-control',
                        'required',
                        'placeholder' => '- Select Zone -',
                        ]) !!}
                    </div>
                </div>

                <!-- Category -->
                <div class="form-group row">
                    {!! Form::label('tenant-category-id', 'Category', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::select(
                        'category_id', 
                        Category::pluck('name', 'id'), $tenant->Category->id, [
                        'id' => 'tenant-category-id',
                        'class' => 'form-control',
                        'required',
                        'placeholder' => '- Select Category -',
                        ]) !!}
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group row">
                    {!! Form::label('tenant-description', 'Description', [
                    'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::textarea('description', $tenant->description, [
                        'id' => 'tenant-description',
                        'class' => 'form-control noresize',
                        'style' => 'resize:vertical; min-height:250px',
                        ]) !!}
                    </div>
                </div>

                <!-- Photo Upload -->
                <div class="form-group row">
                    {!! Form::label('tenant-photo', 'Select Image', [
                        'class' => 'control-label col-sm-2',
                    ]) !!}
                    <div class="col-sm-10">
                        {!! Form::file('image', [
                            'id' => 'tenant-photo-file',
                            'class' => 'form-control',
                        ]) !!}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
