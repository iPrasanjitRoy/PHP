<!DOCTYPE html>
<html lang="en">

<head>
  <title>Delete Multiple Data</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="main">
    <div id="header">
      <h1>Delete Multiple Data With <br>PHP & Ajax CRUD</h1>
    </div>

    <div id="sub-header">
      <button id="delete-btn">Delete</button>
    </div>

    <div id="table-data"></div>
  </div>

  <div id="error-message"></div>
  <div id="success-message"></div>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      // Load Tabular Forms Data Of Students Table From Database 
      function loadData() {
        $.ajax({
          url: "load-data.php",
          type: "POST",
          success: function (data) {
            $("#table-data").html(data);
          }
        });
      }
      loadData(); // Load Table Data When Page Opens 

      // Multiple Data Delete
      $("#delete-btn").on("click", function () {
        var id = [];

        // Converted All Checked Checkbox's Value Into Array 
        $(":checkbox:checked").each(function (key) {
          id[key] = $(this).val();
        });

        if (id.length === 0) {
          alert("Please Select Atleast One Checkbox.");
        } else {
          if (confirm("Do You Really Want To Delete These Records ?")) {
            $.ajax({
              url: "delete-data.php",
              type: "POST",
              data: { id: id },
              success: function (data) {
                if (data == 1) {
                  $("#success-message").html("Data Deleted Successfully.").slideDown();
                  $("#error-message").slideUp();
                  loadData();
                  setTimeout(function () {
                    $("#success-message").slideUp();
                  }, 4000);

                } else {
                  $("#error-message").html("Can't Delete Data.").slideDown();
                  $("#success-message").slideUp();
                  setTimeout(function () {
                    $("#error-message").slideUp();
                  }, 4000);
                }
              }
            });
          }
        }
      });
    });
  </script>
</body>

</html>