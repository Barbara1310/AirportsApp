<?php require_once __DIR__ . '/_header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>AirportsApp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css"/>
</head>
<body>
  <form method="post" id="add_form">
       From: <input type="text" name="From" placeholder="Airport Name">
       <br>
       To: <input type="text" name="To" placeholder="Airport Name">
       <br>
       <div class="">
              <input type="submit" id="add_btn" value="Find my airline" class="btn btn-primary w-25" style="background-color: #A60E2E; border-color: #A60E2E; ; ">
            </div>
   </form>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script>
  $(document).ready(function(){ //not finished
   
     $("#add_btn").on('click',function(e){
        e.preventDefault();
        

        $.ajax({
          url: '../airports/controller/action3.php',
          method: 'post',
          data: $(this).serialize(),
          success: function(response){
          //console.log(response);
            $("#add_btn").val('Find my airline');
            $("#add_form")[0].reset();
           
          }

        });
     });
    });



</script>     
</body>
</html>

<?php require_once __DIR__ . '/_footer.php'; ?>