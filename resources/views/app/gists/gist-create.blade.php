@extends('......app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
            <div class="panel">
                {!! Form::open([
                        'route' => 'gist.store',
                        'method' => 'post',
                        'class' => 'form-horizontal',
                    ])
                !!}
                <fieldset>
                    <!-- Form Name -->
                    <legend>Tạo Gists mới</legend>

                    <!-- Text input-->
                    <div class="form-group row">
                        {!! Form::label('title','Mô tả', ['class' => 'col-md-4 control-label'] ) !!}
                        <div class="col-md-8">
                        {!! Form::text('title','', [
                                'placeholder' => 'mô tả ngắn cho snippet của bạn...',
                                'class' => 'form-control input-md',
                            ])
                        !!}
                        </div>
                    </div>

                    <!-- Textarea-->
                    <div class="form-group row">
                        {!! Form::label('content','Snippet',['class' => 'col-md-4 control-label'] ) !!}
                        <div class="col-md-8">
                        {!! Form::textarea('content','', [
                                'placeholder' => 'nhập bất cứ nội dung gì vào đây...',
                                'class' => 'form-control input-md',
                                'required',
                                'title' => 'Bạn phải nhập nội dung để tạo snippet mới'
                           ])
                        !!}
                        </div>
                    </div>

                </fieldset>

                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        {!! Form::submit('Tạo snippet công khai',['class' => 'btn btn-primary']) !!}
                        {!! Form::submit('Tạo snippet bí mật',['class' => 'btn btn-warning']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
	</div>
</div>
@endsection
