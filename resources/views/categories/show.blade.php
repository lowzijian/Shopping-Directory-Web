@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Category</h1>
        
        <div class="panel-body table-responsive">
            <table class="table table-striped task-table table-hover">
                <!-- Table Headings -->
                <thead>
                    <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    <tr>
                    <td>Name</td>
                    <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                    <td>Description</td>
                    <td>{{ $category->description }}</td>
                    </tr>
                    <tr>
                    <td>Updated at</td>
                    <td>{{ $category->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <a href = "{{ route('category.edit', $category -> id) }}" role = 'button' class = 'btn btn-primary'>Edit</a>
    </div>
</div>
@endsection
