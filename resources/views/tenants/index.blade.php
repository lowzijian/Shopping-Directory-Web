<?php
    use App\Zone;
    use App\Category;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Tenant</h1>
        <div class = "panel-body table-responsive">  
            @if(count($tenants) > 0)
            <div class = "jumbotron" style = "padding:15px 60px;">
                    <section class = "filter">
                        {!! Form::open([
                        'route' => ['tenant.index'],
                        'method' => 'get',
                        'class' => 'form-inline'
                        ]) !!}                        
                            {!! Form::label('tenant-description', 'Filter', [
                            'class' => 'control-label col-sm-1',
                            ]) !!}
                            
                            {!! Form::text('shopName', null, [
                            'id' => 'tenant-shopName',
                            'class' => 'form-control',
                            'maxlength' => 100,
                            'placeholder' => 'Shop Name',
                            ]) !!}
                            
                            {!! Form::text('lotNo', null, [
                            'id' => 'tenant-lotNo',
                            'class' => 'form-control',
                            'maxlength' => 6,
                            'placeholder' => 'Lot No.',
                            ]) !!}

                            {!! Form::select(
                            'floor', 
                            $floors, null, [
                            'id' => 'tenant-floor',
                            'class' => 'form-control',
                            'placeholder' => 'Floor',
                            ]) !!}

                            {!! Form::select(
                            'zone_id', 
                            Zone::pluck('name', 'id'), null, [
                            'id' => 'tenant-zone-id',
                            'class' => 'form-control',
                            'placeholder' => 'Zone',
                            ]) !!}
                            
                            {!! Form::select('category_id',
                            Category::pluck('name', 'id'),
                            null, [
                            'id' => 'tenant-category-id',
                            'class' => 'form-control',
                            'placeholder' => 'Category',
                            ]) !!}

                            {!! Form::button('Filter', [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            ]) !!}
                        {!! Form::close() !!}
                    </section>
                </div>
                <table class="table table-striped table-hover">
                    <!-- Table Head -->
                    <thead>
                        <tr>
                            <th class = "table-text">No.</th>
                            <th class = "table-text">Shop Name</th>
                            <th class = "table-text">Lot No.</th>
                            <th class = "table-text">Floor</th>
                            <th class = "table-text">Zone</th>
                            <th class = "table-text">Category</th>
                            <th class = "table-text col-sm-5">Description</th>
                            <th class = "table-text">Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach($tenants as $i => $tenant)
                            <tr>
                                <td class = "table-text">
                                {{ $i + 1 }}
                                </td>
                                <td class = "table-text">
                                    <div>
                                        {!! link_to_route(
                                            'tenant.show',
                                            $title = $tenant -> shopName,
                                            $parameters = [
                                                'id' => $tenant -> id,
                                                ]
                                        ) !!}
                                    </div>
                                </td>
                                <td class = "table-text">
                                    {{ $tenant -> lotNo }}
                                </td>
                                <td class = "table-text">
                                    {{ $tenant -> floor }}
                                </td>
                                <td class = "table-text">
                                    {{ $tenant->Zone->name }}
                                </td>
                                <td class = "table-text">
                                    {{ $tenant->Category->name }}
                                </td>
                                <td class = "table-text col-sm-5">
                                    {{ \Illuminate\Support\Str::limit($tenant -> description, 55) }}
                                </td>
                                <td class="table-text">
                                    <div>
                                    <a href = "{{route('tenant.edit', $tenant -> id)}}">
                                        <span class = "glyphicon glyphicon-edit"></span>
                                    </a>
                                        <!--
                                        {!! link_to_route(
                                        'tenant.edit',
                                        $title = 'Edit',
                                        $parameters = [
                                        'id' => $tenant -> id,
                                        ]) !!}
                                        -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>No record is found</div>
            @endif
        </div>
    </div>
    <!-- add button 
    ref: https://www.w3schools.com/bootstrap4/bootstrap_buttons.asp
    -->
    <div>
        <a href = "/tenant/create" role = 'button' class = 'btn btn-primary'>Add Tenant</a>
    </div>
</div>
@endsection
