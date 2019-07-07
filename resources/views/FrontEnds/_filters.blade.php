<?php
use App\Zone;
use App\Category;
use App\Tenant;
?>

<script>
function resetErrorMsg()
{
    //console.log('Entered');
    var element = document.getElementById('errorMessage');
    element.value = "";
}
</script>

<div class = "rounded-1 mt-5" style = "padding:0px 60px;">
    <section class="filters p-auto">
        {!! Form::open([
        'name' => 'filterForm',
        'id' => 'filterForm',
        'route' => ['frontend.searchAll', $id],
        'method' => 'get',
        'class' => 'form-inline',
        'onsubmit' => 'resetErrorMsg()'
        ]) !!}
            {!! Form::text('shopName', $shopName, [
            'id' => 'shopName',
            'class' => 'form-control mx-2',
            'placeholder' => 'Shop Name',
            'maxlength' => 60,
            ]) !!}

            {!! Form::select('zone-id', Zone::pluck('name', 'id'), $zoneId, [
            'id' => 'zone-id',
            'class' => 'form-control mx-2',
            'placeholder' => '- Zones -',
            ]) !!}

            {!! Form::select('tenant-floor', Tenant::pluck('floor', 'floor')->unique() , $tenantFloor, [
            'id' => 'tenant-floor', 
            'class' => 'form-control mx-2',
            'placeholder' => '- Floor Levels -',
            ]) !!}

            {!! Form::select('category-id', Category::pluck('name', 'id'), $categoryId, [
            'id' => 'category-id',
            'class' => 'form-control mx-2',
            'placeholder' => '- Categories -',
            ]) !!}

            {!! Form::hidden('errorMessage', "", ['id' => 'errorMessage']) !!}
            
            {!! Form::button('Filter', [
            'type' => 'submit',
            'class' => 'btn btn-primary mx-2',
            ]) !!}
            
            <img class = "ml-2" src="/img/filter.png" alt="" >
        {!! Form::close() !!}
    </section>

</div>