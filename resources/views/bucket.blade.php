<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bucket</title>
    <link href="/libs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<ul class="list-group">
    @foreach($buckets->getBucketList() as $bucketInfo)
        <li class="list-group-item"><a href="{{ route('path', array_merge(Request::all(),['b' => $bucketInfo -> getName()])) }}">{{ $bucketInfo -> getName() }}</a></li>
    @endforeach
</ul>
<script src="/libs/jquery/dist/jquery.js"></script>
<script src="/libs/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>