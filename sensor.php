<html>
<head>
    <style>
        body{
            background-color: rosybrown;
            font-family: Arial;
            color:rgb(242, 242, 248);
            text-align: center;
        }
        h1{
            margin-top: 5em;

        }
        p{
            margin-top: 12em;
            font-family: serif;
            text-align: center;
        }
        table {
            margin-top: 4em;
            margin-left: 43em;
        }
    </style>
</head>
<body>
<h1>RESULT <img src="https://cdn-icons-png.flaticon.com/512/2540/2540201.png" width="30" height="30"></h1>
    <?php
    $SERVER ="localhost:3308";
    $username="root";
    $password="";
    $dbname="sensor";

    $conn=mysqli_connect($SERVER,$username,$password,$dbname);
    if(empty($_GET['value']))
    {
        echo "please enter vaule again <br>";
    }
    else
    {
        $value=$_GET['value'];
        echo "<p>" , " The value you entered :" . $_GET['value'], '<br /></p>';
    }

    $query= "insert into sensor values($value)" ;
    $run=mysqli_query($conn,$query);
    echo "<h3>" , "Values of all sensors in the Database", '<br /></h3>';
    $sql = "SELECT * FROM sensor";
    $result =  mysqli_query($conn, $sql);
    echo "<table border='1'>";
    while ($row = mysqli_fetch_assoc($result)) { 
        echo "<tr>";
        foreach ($row as $field => $value) { 
            echo "<td>" . $value . "</td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
    </form>

</body>
</html>