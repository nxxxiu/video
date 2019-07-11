<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>视频详情页</title>
</head>
<body>
    <p>视频名称：{{$data['vname']}}</p>
    <div style="border: 1px solid lightgrey">
        <video src="{{env('CDN_HOST')}}/{{$data['path']}}" controls="controls"></video>
    </div>
</body>
</html>