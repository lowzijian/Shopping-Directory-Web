<?php
    use App\Zone;
    use App\Category;
?>
@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Tenant</h1>
        
        <div class="panel-body table-responsive">
            <table class="table table-striped task-table table-hover">
                <!-- Table Headings -->
                <thead>
                </thead>
                <!-- Table Body -->
                <tbody>
                    <tr>
                        <td rowspan="7" width="300px">
                            <div class = "img-responsive">
                                @if(Storage::disk('public')->exists('tenants/'.$tenant->lotNo.'.jpg'))
                                    <img src="/storage/tenants/{{$tenant->lotNo}}.jpg" width="100%" height="100%" alt="{{ $tenant->shopName }}">
                                @endif
                            </div>
                        </td>
                        <td>Name</td>
                        <td>{{ $tenant->shopName }}</td>
                    </tr>
                    <tr>
                        <td>Lot No.</td>
                        <td>{{ $tenant->lotNo }}</td>
                    </tr>
                    <tr>
                        <td>Floor</td>
                        <td>{{ $tenant->floor }}</td>
                    </tr>
                    <tr>
                        <td>Zone</td>
                        <td>{{ $tenant->Zone->name }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $tenant->Category->name }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            {!! Form::textarea('description', $tenant->description, [
                                'id' => 'tenant-description',
                                'class' => 'form-control',
                                'style' => 'resize:none; background-color:white; border: none; box-shadow: none; padding: 0px;',
                                'rows' => '10',
                                'readonly',
                            ]) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Updated at</td>
                        <td>{{ $tenant->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <a href = "{{ route('tenant.edit', $tenant -> id) }}" role = 'button' class = 'btn btn-primary'>Edit</a>
    </div>
</div>
@endsection
