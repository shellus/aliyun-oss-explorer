<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>目录：{{ $path }}</title>
    <link href="/libs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<ul class="list-group">

    @foreach($paths as $path)
        <li class="list-group-item"><a href="{{ route('path', array_merge(Request::all(),['p' => $path -> getPrefix()])) }}">{{ $path -> getPrefix() }}</a></li>
    @endforeach

    @foreach($objects as $key => $object)
            @if($object -> getKey() !== $path)
                <li class="list-group-item">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $object -> getKey() }}
                    </a>
                    <div id="collapse{{$key}}" class="collapse">
                        <div class="">
                            <ul>
                                <li>
                                    <span>公开读url：</span><span>
                                        {{ Request::get('b') . '.' . env('OSS_HOST') .'/' . $object -> getKey() }}
                                    </span>
                                </li>
                                <li>
                                    <span>私有读url：</span><span class="sign-url">

                                    </span>
                                </li>
                                <li>
                                    <form class="form-inline sign-url-form" action="{{ route('sign-url', Request::all()) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>访问时间
                                                <input name="t" type="text" class="form-control" value="3600">
                                            </label>
                                        </div>
                                        <input type="hidden" name="o" value="{{ $object -> getKey() }}">
                                        {{--@foreach(Request::all() as $key => $item)--}}
                                            {{--<input type="hidden" name="{{ $key }}" value="{{ $item }}">--}}
                                        {{--@endforeach--}}
                                        <button type="submit" class="btn btn-default">获取私有url</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @endif
    @endforeach

</ul>
<script src="/libs/jquery/dist/jquery.js"></script>
<script src="/libs/bootstrap/dist/js/bootstrap.js"></script>
<script>
    $(function () {
        $(document).on('submit', '.sign-url-form', function (event) {
            var self = this;
            $(self).parent().parent().find('li .sign-url').load($(this).attr('action'), $(this).serializeArray());
//            $.post($(this).attr('action'), $(this).serializeArray(),function(responseText){
//                $(self).parent().parent().find('li .sign-url').html(responseText);
//            });
            return false;
        })
    });
</script>
</body>
</html>