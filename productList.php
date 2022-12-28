<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="./productListStyle.css">
</head>
<body>
    <header>
        <h1>Product List</h1>
        <nav>
            <ul class="action">
                <li>
                    <a href="./productAdd.php">Add</a>
                </li>
                <li>
                    <button id="delete">Mass Delite</button>
                </li>
            </ul>
        </nav>
    </header>

    <hr>

    <div id="listView" class="listView">
    </div>
    <script src="./productListScript.js"></script>
</body>
</html>