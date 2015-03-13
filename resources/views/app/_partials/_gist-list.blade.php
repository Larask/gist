@unless(count($gists))
<div class="well">
    <h4>Không tìm thấy kết quả nào</h4>
</div>
@endunless

@foreach($gists as $gist)
<div class="well">
    <div class="row">
        <div class="col-lg-8">
            <a href="{{ $gist->user->present()->link }}">{{ '@'. $gist->user->username }}</a>
             /
            <a href="{{ $gist->present()->link }}">{{ $gist->title }}</a>
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
