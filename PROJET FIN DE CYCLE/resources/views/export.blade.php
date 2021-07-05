<!DOCTYPE html>
<html lang="en">
   
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Exportation de Donnée</title>
    </head>

    <body>
        <form action="{{route('export.file')}}" method="post" enctype="multipart/form-data">
           @csrf
           <input type="file" name="file">
           <input type="submit" value="upload" name="submit">
        </form>   
    </body>
</html>
