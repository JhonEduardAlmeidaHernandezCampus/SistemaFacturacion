<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        
        .calculator {
            width: 250px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .calculator h2 {
            text-align: center;
        }
        
        .calculator form {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }
        
        .calculator input[type="submit"] {
            width: 100%;
            height: 60px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .calculator input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .calculator input[type="text"], .mostrar {
            grid-column: 1 / span 4;
            display: flex;
            justify-self: center;
            width: 90%;
            height: 30px;
            padding: 10px;
            font-size: 24px;
            text-align: right;
            border: 1px solid #ccc;
            box-shadow: inset 0 2px 2px rgba(0, 0, 0, 0.1);
        }

        .mostrar   {
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
    <div class="calculator">
        <h2>Calculadora</h2>
        <div class="mostrar">
                <?php
                    $cero = $_POST['0'];
                    $uno = $_POST['1'];
                    $dos = $_POST['2'];
                    $tres = $_POST['3'];
                    $cuatro = $_POST['4'];
                    $cinco = $_POST['5'];
                    $seis = $_POST['6'];
                    $siete = $_POST['7'];
                    $ocho = $_POST['8'];
                    $nueve = $_POST['9'];

                    echo $cero.$uno.$dos;
                ?>
        </div>
        <form action="app.php" method="post">
            <input type="submit" name="7" value="7">
            <input type="submit" name="8" value="8">
            <input type="submit" name="9" value="9">
            <input type="submit" name="/" value="/">
            <input type="submit" name="4" value="4">
            <input type="submit" name="5" value="5">
            <input type="submit" name="6" value="6">
            <input type="submit" name="*" value="*">
            <input type="submit" name="1" value="1">
            <input type="submit" name="2" value="2">
            <input type="submit" name="3" value="3">
            <input type="submit" name="-" value="-">
            <input type="submit" name="0" value="0">
            <input type="submit" name="." value=".">
            <input type="submit" name="=" value="=">
            <input type="submit" name="+" value="+">
        </form>
    </div>
    
    

</body>
</html>
