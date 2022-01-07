<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <form method="post" id="insert_from">
    <div class="table-responsive">
      <table class="table table-bordered" id="item_table">
        <tr>
          <th>Medicine</th>
          <th>Company</th>
          <th>Dosage</th>
          <th>Remark</th>
          <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
        </tr>
        
      </table>
      <div align="center">
        <input type="submit" name="submit" class="btn btn-info" value="Insert"/>
      </div> 
    </div>
  </form>

</body>
</html>
<script >
  $(document).ready(function(){
$(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="medicine"/></td>';
  html += '<td><input type="text" name="dosage"/></td>';
  html += '<td><input type="text" name="company"/></td>';
  html += '<td><input type="text" name="remark"/></td>';
  html += '<td><button type="button" name="remove" class ="btn btn-danger btn-sm remove" ><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

  $('#item_table').append(html);

});
$(document).on('click', '.remove', function(){
    $(this).closest('tr').remove();
  });
});
</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
