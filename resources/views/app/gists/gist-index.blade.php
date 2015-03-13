@extends('app')

@section('content')
<div class="container">
	<div class="row">

    <!-- Snippet block -->
    <div class="col-lg-8">
        @foreach($gists as $gist)
            <div class="well">

                <div class="row">
                    <div class="col-lg-8">
                    {{ $gist->user->username }} / {{ $gist->title }}
                    </div>

                    <div class="col-lg-4">
                    show stat here
                    </div>
                </div>

                <div class="row snippet--display">
                    <div class="col-lg-12">
                        {{ $gist->content }}
                    </div>
                </div>
                <!-- /.row -->
            </div>
        @endforeach
        <div class="pagination">
            {!! $gists->render() !!}
        </div>
    </div>


    <!-- Sidebar -->
    <div class="col-md-4">

        <!-- Search Well -->
        <div class="well">
            <h4>Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Tag Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>

</div>
<!-- /.row -->
</div>
<!-- / .container -->
@endsection
