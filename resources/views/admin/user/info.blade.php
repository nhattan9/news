
@extends('admin.layouts.admin')

@section('title')
 <title>Info User </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('adminTemplate\demo\assets\vendors\choices.js\choices.min.css')}}" />
@endsection
@section('content')
@include('admin.partials.breadcum',['name' => ' User', 'key' => 'Info'])
<br>

<section class="section">
    <div class="card">
        
        <div class="card-body">
            
        </div>
    </div>
</section>

@endsection
@section('js')
<script src="{{asset('adminTemplate\demo\assets\vendors\choices.js\choices.min.js')}}"></script>
@endsection