<html>

<head>
    <script src="jquery-1.9.1.min.js">
    </script>
    <script>
    (document).ready(function() {
        var response = '';
        .ajax({
            type: "GET",
            url: "Records.php",
            async: false,
            success: function(text) {
                response = text;
            }
        });

        alert(response);
    });
    </script>
</head>

<body>
    <div id="div1">
        <h2>Let jQuery AJAX Change This Text</h2>
    </div>
    <button>Get Records</button>
</body>

</html>