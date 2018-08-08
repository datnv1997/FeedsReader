<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{ csrf_token()}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

</head>
<body>
<div class="container">

    <div>
        <h3 style="text-align: center">         id:            <?php echo $_POST['id'] ?> </h3>
        title:<br>
        <textarea name="title_text" id="" cols="100%" rows="4"><?php echo $_POST['title'];?></textarea><br>


        <button type="submit">submit </button>
        <button type="button" >Cancel</button>

    </div>

    <div>

    </div>


</div>


</body>