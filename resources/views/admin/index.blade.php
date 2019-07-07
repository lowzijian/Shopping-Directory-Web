<?php
    use App\Tenant;
    use App\Zone;
    use App\Category;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 class="panel-heading">Total</h1>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item">Tenant<span class="badge">{{ Tenant::get()->count()}}</span></li>
                        <li class="list-group-item">Zone<span class="badge">{{ Zone::get()->count()}}</span></li> 
                        <li class="list-group-item">Category<span class="badge">{{ Category::get()->count()}}</span></li> 
                    </ul>
                   
                     <!--
                    You are logged in!
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
