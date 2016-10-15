
<!DOCTYPE html>
<head>
<title>Untitled Document</title>

<script src="http://code.jquery.com/jquery-latest.js"></script>

<script>
    $(document).ready(function(){
        setInterval(function() {
            $("#latestData").load("random.php");
        }, 10000);
    });

</script>
</head>

<body>
    <div id = "latestData">

    </div>
</body>
</html>
