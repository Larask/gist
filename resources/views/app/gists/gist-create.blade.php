@extends('app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-12">
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
                    'id' => 'gist'
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
                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-2">
                    {!! Form::submit('Tạo snippet công khai',[
                            'class' => 'btn btn-primary',
                            'id' => 'btn-public',
                            'data-loading' => 'Processing...',
                            'data-public' => true
                        ])
                    !!}

                    {!! Form::submit('Tạo snippet bí mật',[
                            'class' => 'btn btn-success',
                            'id' => 'btn-private',
                            'data-loading' => 'Processing...',
                            'data-public' => false
                        ])
                    !!}
                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
        <!-- / .col-md-12 -->
    </div>
	<!-- / .row -->
</div>
<!-- / .container -->
@endsection

@section('footer')
<script src="/js/ace/ace.js"></script>
<script>
var editor = ace.edit("content");

(function($) {
    $(function() {
        $('#gist').on('submit', function(event)
        {
            event.preventDefault();
        });

        $('#btn-public').on('click', function(event)
        {
            event.preventDefault();
            send($(this));
        });

        $('#btn-private').on('click', function(event)
        {
            event.preventDefault();
            send($(this));
        });

    });
    var send = function(button)
    {
        $.ajax({
            type: 'POST',
            url: $('#gist').attr('action'),
            data: {
                '_token' : $("input[name='_token']").val(),
                'content' : editor.getSession().getValue(),
                'title' : $("input[name='title']").val(),
                'public' : button.data('public')
            },
            beforeSend: function(){
                button.button('loading');
            },
            error: function (data) {
                button.button('reset');
                if (data.status == '422')
                    alert('validation error');
                else
                    alert('unknow error');
            },
            success: function (data) {
                button.button('reset');
                window.location = createGistLink(data);
            }
        });
    };

    var createGistLink = function(data)
    {
        username = data.user.username;
        gistId = data.gist.id.substring(0, 7);

        return '/@' + username + '/' + gistId;
    }
})(jQuery);
</script>
@endsection
