@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Category</h1>
    
        <div class = "panel-body table-responsive">
            @if(count($categories) > 0)
                <table class="table table-striped table-hover">
                    <!-- Table Head -->
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th class = "table-text col-sm-8">Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach($categories as $i => $category)
                            <tr>
                                <td class = "table-text">
                                {{ $i + 1 }}
                                </td>
                                <td class = "table-text">
                                    <div>
                                        {!! link_to_route(
                                            'category.show',
                                            $title = $category -> name,
                                            $parameters = [
                                                'id' => $category -> id,
                                                ]
                                        ) !!}
                                    </div>
                                </td>
                                <td class = "table-text col-sm-8">
                                {{ $category -> description }}
                                </td>
                                <td class="table-text">
                                    <div>
                                    <a href = "{{route('category.edit', $category -> id)}}">
                                        <span class = "glyphicon glyphicon-edit"></span>
                                    </a>
                                        <!--
                                        {!! link_to_route(
                                        'category.edit',
                                        $title = 'Edit',
                                        $parameters = [
                                        'id' => $category -> id,
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
        <a href = "/category/create" role = 'button' class = 'btn btn-primary'>Add Category</a>
    </div>
</div>
@endsection
