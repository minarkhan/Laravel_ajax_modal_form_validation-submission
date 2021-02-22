<!DOCTYPE html>
<html>
<head>
    <title>Laravel Ajax Validation Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> --}}


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
    <h2>Laravel Ajax Validation</h2>


    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


    <form>
        {{ csrf_field() }}
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="first_name" class="form-control" placeholder="First Name">
        </div>


        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
        </div>


        <div class="form-group">
            <strong>Email:</strong>
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>


        <div class="form-group">
            <strong>Address:</strong>
            <textarea class="form-control" name="address" placeholder="Address"></textarea>
        </div>


        <div class="form-group">
            <button class="btn btn-success btn-submit">Submit</button>
        </div>
    </form>
</div>
<div class="container">
    <h2>Modal Example</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>


<script type="text/javascript">


    $(document).ready(function() {
        $(".btn-submit").click(function(e){
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var first_name = $("input[name='first_name']").val();
            var last_name = $("input[name='last_name']").val();
            var email = $("input[name='email']").val();
            var address = $("textarea[name='address']").val();


            $.ajax({
                url: "/my-form",
                type:'POST',
                data: {_token:_token, first_name:first_name, last_name:last_name, email:email, address:address},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        });


        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>


</body>
</html>
