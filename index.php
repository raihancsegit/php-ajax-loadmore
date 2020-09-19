<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Pagination</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>PHP & Ajax Pagination</h1>
    </div>

    <div id="table-data">
      <table id="loadData" border="1" width="100%" cellspacing="0" cellpadding="10px">
          <tr>
            <th>Id</th>
            <th>Name</th>
          </tr>
        
        </table>
    </div>

    

  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    function load_data(page){
      $.ajax({
        url: "ajax-pagination.php",
        type: "POST",
        data: {page_no :page },
        success: function(data) {
          if(data){
            $("#pagination").remove();
            $("#loadData").append(data);
          }else{
            $("#ajaxbtn").html("Finished");
            $("#ajaxbtn").prop("disabled",true);
          }
        }
      });
    }
    
    load_data();

    $(document).on("click","#ajaxbtn",function(e) {
      $("#ajaxbtn").html("Loading...");
      var page_id = $(this).data("id");

      load_data(page_id);
    })

  });
</script>
</body>





</html>
