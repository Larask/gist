@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <div class="panel">
            <div class="pannel-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::open([
                    'route' => 'gist.store',
                    'method' => 'post',
                    'class' => 'form-vertical',
                ])
            !!}
            <fieldset>
                <!-- Form Name -->
                <legend>Tạo Gists mới</legend>

                <!-- Text input-->
                <div class="form-group row">
                    {!! Form::label('title','Mô tả', ['class' => 'col-md-2 control-label'] ) !!}
                    <div class="col-md-10">
                    {!! Form::text('title','', [
                            'placeholder' => 'mô tả ngắn cho snippet của bạn...',
                            'class' => 'form-control input-md',
                        ])
                    !!}
                    </div>
                </div>

                <!-- Textarea-->
                <div class="form-group row">
                    {!! Form::label('content','Snippet',['class' => 'col-md-2 control-label'] ) !!}
                    <div class="col-md-10">
                        <div id="content" class="snippet--input">nhập bất cứ thứ gì vào đây</div>
                    </div>
                </div>

                <!-- Checkbox -->
                <div class="form-group row">
                    {!! Form::label('public','Công khai',['class' => 'col-md-2 control-label'] ) !!}
                    <div class="col-md-10 col-sm-2">
                    {!! Form::checkbox('public', true, ['checked']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-2">
                    {!! Form::submit('Tạo snippet',['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </fieldset>

            </div>
            {!! Form::close() !!}
            </div>
        </div>
        <!-- /.pannel -->
	</div>
	<!-- / .row -->
</div>
<!-- / .container -->
@endsection

@section('footer')
<script src="/js/ace/ace.js"></script>
<script>
(function($) {
  $(function() {
    $("input[name='public']").bootstrapSwitch();
  });
})(jQuery);
var editor = ace.edit("content");
</script>
@endsection
