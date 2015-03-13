@extends('app')

@section('title')
All Gists
@endsection

@section('content')
<div class="container">
	<div class="row">

        <!-- Snippet block -->
        <div class="col-lg-8">
            @include('app._partials._gist-list')
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            @include('app._partials._sidebar-search')
            @include('app._partials._sidebar-tags')
        </div>

    </div>
<!-- /.row -->
</div>
<!-- / .container -->
@endsection
