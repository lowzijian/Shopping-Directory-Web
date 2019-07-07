@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <h1 class="panel-heading">Zone</h1>
    
        <div class = "panel-body table-responsive">
            @if(count($zones) > 0)
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
                        @foreach($zones as $i => $zone)
                            <tr>
                                <td class = "table-text">
                                {{ $i + 1 }}
                                </td>
                                <td class = "table-text">
                                    <div>
                                        {!! link_to_route(
                                            'zone.show',
                                            $title = $zone -> name,
                                            $parameters = [
                                                'id' => $zone -> id,
                                                ]
                                        ) !!}
                                    </div>
                                </td>
                                <td class = "table-text col-sm-8">
                                {{ $zone -> description }}
                                </td>
                                <td class="table-text">
                                    <div>
                                    <a href = "{{route('zone.edit', $zone -> id)}}">
                                        <span class = "glyphicon glyphicon-edit"></span>
                                    </a>
                                        <!--
                                        {!! link_to_route(
                                        'zone.edit',
                                        $title = 'Edit',
                                        $parameters = [
                                        'id' => $zone -> id,
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
        <a href = "/zone/create" role = 'button' class = 'btn btn-primary'>Add Zone</a>
    </div>
</div>
@endsection
