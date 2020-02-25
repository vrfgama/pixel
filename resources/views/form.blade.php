<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=" {{url('/pixel/upload')}} " method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="img" id="img"><br><br>
        <button type="submit">Upload</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>