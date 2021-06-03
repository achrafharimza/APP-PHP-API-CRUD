<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container" style="margin-top: 30px;">
        <h3 align="center" style="margin-bottom: 20px;">vol</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">depart</th>
                    <th scope="col">destination</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <form method="POST" id="api_form">
            <div class="form-group">
                <input type="text" name="depart" class="form-control" id="depart" placeholder="depart">
            </div>
            <div class="form-group">
                <input type="text" name="destination" class="form-control" id="destination" placeholder="destination">
            </div>
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="hidden" name="action" id="action" value="addNew" />
            <input type="submit" id="submit" 
                name="submit" class="btn btn-primary" value="Add" />
                
        </form>
    </div>

    <script>
        $(document).ready(function(){

            outputData();
            
            function outputData(){
                $.ajax({
                    url: "output.php",
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            }

            $('#api_form').on('submit', function(event){
              
                    var formData = $(this).serialize();
                    $.ajax({
                        url: "controller.php",
                        method: "POST",
                        data: formData,
                        success:function(data){
                            outputData();
                           
                        }
                    });
                
            });

$(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  var action = 'fetch_single';
  $.ajax({
   url:"controller.php",
   method:"POST",
   data:{id:id, action:action},
   dataType:"json",
   success:function(data)
   {
    $('#hidden_id').val(id);
    $('#depart').val(data.depart);
    $('#destination').val(data.destination);
    $('#action').val('update');
    $('#submit').val('update');
   
   }
  })
 });




            
             $(document).on('click', '.delete', function(){
              var id = $(this).attr("id");
             var action = 'delete';
             $.ajax({
                        url: "controller.php",
                        method: "POST",
                       data:{id:id, action:action},
                        success:function(data){
                            outputData();
                           
                        }
                    });
                
            });


        });
    </script>
</body>
</html>