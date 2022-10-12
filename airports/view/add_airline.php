<?php require_once __DIR__ . '/_header.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>AirportsApp</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css"/>
  


<div class="container" style = "background-color: white;">
  <div class="row my-4" style = "background-color: white;">
    <div class="col-lg-10 mx-auto" style = "background-color: white;">
      <div class="card shadow" style = "background-color: white;">
        <div class="card-header" style = "background-color: white;">

        </div>
        <div class="card-body p-4" style = "background-color: white;">
          <div id="show_alert"></div>
          <form class="#" method="post" id="add_form" style = "background-color: white;">
            <div id="show_item">
              <div class="row">
                

              </div>

            </div>
            <div class="col-md-4 mb-3">
             <input type="text" name="Name" placeholder="Name">
            
            </div>
            <p>Select country: </p>
              <?php   

              for($i=0; $i<count($countries); $i++)
              {
                ?>
                  <input type="checkbox" name="countries[]" value="<?php echo $countries[$i]->c_code ?>" id="<?php echo $countries[$i]->c_code ?>">
                   <label for="<?php echo $countries[$i]->c_name ?>"> <?php echo $countries[$i]->c_name ?> </label>

               <?php
              }
              ?>
            <div>

            </div>

            <div class="">
              <input type="submit" id="add_btn" value="Add" class="btn btn-primary w-25" style="background-color: #A60E2E; border-color: #A60E2E; ; ">
            </div>
          </form>

        </div>

      </div>

    </div>

  </div>

</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script>
  $(document).ready(function(){
   
     $("#add_form").submit(function(e){
        e.preventDefault();
        $("#add_btn").val('Adding...');
        //console.log("tu sam");

        $.ajax({
          url: '../airports/controller/action2.php',
          method: 'post',
          data: $(this).serialize(),
          success: function(response){
          //console.log(response);
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append_item").remove();
            $("#show_alert").html('<div class="alert alert-success" role="alert">New airline added.</div>');
          }

        });
     });
    });



</script>
</body>
</html>