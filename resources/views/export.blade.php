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
.box{
    margin-top: 70px;
    width: 40%;
    height: 300px;
    border: 1px solid black;
margin-left: auto;
margin-right: auto;
padding-top: 50px;
padding-left: 50px;
}
    </style>
</head>
<body>
    <a href="../index"><button class="btn btn-primary"><i class="material-icons">arrow_back</i></button></a>

    <div class="box">
        <h3>Select to export</h3>
    <form action="{{url('down')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="hidden" name="title" value=""/>
            <input type="checkbox" name="title" value="title" {{ old('title', isset($category) ? 'checked' : '') }}/>
            <label style="padding-left: 20px" class="form-check-label" for="exampleCheck1">Title</label>
        </div>
        <div class="form-group">
            <input type="hidden" name="author" value=""/>
            <input type="checkbox" name="author" value="author" {{ old('author', isset($category) ? 'checked' : '') }}/>
            <label style="padding-left: 20px" class="form-check-label" for="exampleCheck1">Author</label>
        </div>

<div style="display: flex">
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="button" value="csv" class="btn btn-default">Export as CSV</button>
      </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="button" value="xml" class="btn btn-default">Export as XML</button>
        </div>
      </div>
    </div>
    </form>
</div>
</body>
</html>
