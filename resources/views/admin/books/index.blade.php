@extends('layouts.app')

@section('content')
    <div class="panel-body table-responsive">
        <router-view name="companiesIndex"></router-view>
        <router-view></router-view>
    </div>
@endsection