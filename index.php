
<html>
    <head>
        <title>Asia</title>
        <style>
            body{
                background-color: rosybrown;
                font-family: Arial;
                color:rgb(242, 242, 248);
                text-align: center;
            }
            #value{

                width: 12em;
                height: 2em;
                border-radius: 10px;
            }
            #submit{
                width: 6em;
                height: 2em;

                border-radius: 10px;
            }
            p{
                margin-top: 12em;
                font-family: serif;
                text-align: center;
            }
            h1{
                margin-top: 3em;

            }

        </style>
    </head>
    <body>
            <h1> SENSORS VALUE <img src="https://cdn-icons-png.flaticon.com/512/2540/2540201.png" width="30" height="30"> </h1>
            
            <br/>
            <form action="sensor.php" method="GET">
            <p>Pleas enter valus of sensor :</p><input type="number" id="value" name="value"></br></br>
            <input type="submit" id="submit" value="submit" name="submit">
            </form>
    </body>
</html>
