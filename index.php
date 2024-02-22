<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
    <title>Live Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<input type="text" id="names" name="name" placeholder="Type names to search..." required></br>
Result:
<div id="resultSearch">
    <!-- Display chat messages here -->
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(document).ready(function(){
        $('#names').on('input', function(){
            var name_val = $(this).val(); // Declare a variable to get value from <input>
            if(name_val != ''){
                $.ajax({
                    url:"sql.php", // Link your php file
                    method:"POST", // Use Method $_POST instead of using <form method="post">
                    data:{searchName: name_val}, // The index to search and the value get from <input>
                    success:function(data){
                        $('#resultSearch').html(data); // Result as html
                    }
                });
            } else {
                $('#resultSearch').html(""); // No input value, result = empty
            }
        });
    });
});
</script>
</body>
</html>