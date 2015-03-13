@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
            <div class="panel">

                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        <button class="btn btn-primary">Fork</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.pannel -->
        </div>
        <!-- /.col-md-10 -->
	</div>
	<!-- / .row -->
</div>
<!-- / .container -->
@endsection
