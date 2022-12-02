<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
    <style>

.boxx{
    width: 100%;
    margin-top: 100px;

}
.font{
    font-size: 20px;
}
    </style>
</head>
<body>
    <a href="../index"><button class="btn btn-primary"><i class="material-icons">arrow_back</i></button></a>
    <div class="boxx">
    <form class="form-horizontal" action="{{url('edit-author',$book->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-2 font" for="author">Title:</label>
            <div class="col-sm-4">
              <label class="control-label col-sm-2 font" for="author">{{$book->title}}</label>

            </div>
          </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="author">Author:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" value="{{$book->author}}" id="author" name="author">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
