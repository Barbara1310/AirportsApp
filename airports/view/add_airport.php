<?php require_once __DIR__ . '/_header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>AirportsApp</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>
  
       Name: <input type="text">
       <br>
       Country: 
       <input type="text" list="datalist_countries" id="txt_c">
       <datalist id="datalist_countries"></datalist>

    
    <script>
        $(document).ready(function() {
            let txt = $( "#txt_c" );


txt.on( "input", function(e)
{
    let unos = $( this ).val(); // this = HTML element input, $(this) = jQuery objekt

  
    $.ajax(
    {
        
        url: "readCountry.php",
        type: "GET",
        data:
        {
            q: unos
        },
        success: function( data )
        {
            
            $( "#datalist_countries" ).html( data );
        },
        error: function( xhr, status )
        {
            if( status !== null )
                console.log( "Greška prilikom Ajax poziva: " + status );
        }
    } );
} );
});
    </script>
    
</body>
</html>
