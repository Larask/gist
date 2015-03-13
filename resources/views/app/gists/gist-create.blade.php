@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
            <div class="panel">
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
                        {!! Form::textarea('content','', [
                                'placeholder' => 'nhập bất cứ nội dung gì vào đây...',
                                'class' => 'form-control input-md snippet--input',
                                'required',
                                'title' => 'Bạn phải nhập nội dung để tạo snippet mới'
                           ])
                        !!}
                        </div>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-group row">
                        {!! Form::label('public','Công khai',['class' => 'col-md-2 control-label'] ) !!}
                        <div class="col-md-10">
                        {!! Form::checkbox('public', true, ['checked']) !!}
                        </div>
                    </div>
                </fieldset>

                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        {!! Form::submit('Tạo snippet',['class' => 'btn btn-primary']) !!}
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
