<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<title></title>
</head>
<body>
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addMyModal">Open Modal</button>
<div class="modal fade" id="addMyModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Stuff</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="newModalForm">
          <div class="form-group">
            <label class="control-label col-md-3" for="email">A p Name:</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="pName" name="pName" placeholder="Enter a p name" require/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="email">Action:</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="action" name="action" placeholder="Enter and action" require>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="email">number</label>
            <div class="col-md-9">
              <input type="number" class="form-control" id="number" name="number" placeholder="Enter and action" require>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="email">mail</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter and action" require>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnSaveIt">Save</button>
            <button type="button" class="btn btn-default" id="btnCloseIt" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
<script type="text/javascript">
	$(function() {

  $("#newModalForm").validate({
    rules: {
      pName: {
        required: true,
        minlength: 3,
        maxlength: 6
      },
      action: "required",
      number: {
      	required: true,
      	
     
      },
      email: {
      	required: true,

      }
    },
    messages: {
      pName: {
        required: "Please enter some data",
        minlength: "Your data must be at least 3 characters",
        maxlength: "Your data must not exceed 6 characters"
      },
      action: "Please provide some data",
      number: {
      	required: "Please enter some contact",
      	msg : "Your data is not corrrect",
        

      },
      email: {
      	required: "Please enter email contact",
      	
      }
    }
  });
});
</script>
</html>