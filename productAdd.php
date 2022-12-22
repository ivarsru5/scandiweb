<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="./addProductStyle.css">
</head>
<body>
    <header>
            <h1>Add Product</h1>
            <nav>
                <ul class="action">
                    <li>
                        <button class="add" id="save">Save</button>
                    </li>
                    <li>
                        <button class="cancel" onclick="history.back()">Cancel</button>
                    </li>
                </ul>
            </nav>
    </header>

    <hr>

    <form class="input">
        <div>
        <label for="sku">SKU:</label>
        <input id="sku" type="text" name="sku" placeholder="#SKU">
        </div>

        <div>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" placeholder="#name">
        </div>

        <div>
        <label for="price">Price ($):</label>
        <input id="price" type="text" name="price" placeholder="#price">
        </div>

        <div class="switcher">
            <h3>Type Switcher</h3>

            <select name="select" id="select">
                <option selected disabled>Choose a type</option>
                <option value="dvd">DVD</option>
                <option value="furniture">Furniture</option>
                <option value="book">Book</option>
            </select>
        </div>

        <div class="switchContent">

            <div class="dvd-mem", id="dvd">
                <p>DVD-disc</p>
                <label for="dvd-memory">Size(MB):</label>
                <input type="text" name="dvd-memory" placeholder="Please enter MB amount here">
                <p>Please enter amount of disc memory in MB.</p>
            </div>

            <div class="furniture" id="furniture">
                <p>Furniture</p>

                <div>
                <label for="height">Height(CM):</label>
                <input type="text" name="height" placeholder="Enter height in here">
                </div>

                <div>
                <label for="width">Width(CM):</label>
                <input type="text" name="width" placeholder="Enter width in here">
                </div>

                <div>
                <label for="lenght">Height(CM):</label>
                <input type="text" name="lenght" placeholder="Enter lenght in here">
                </div>

                <p>Please enter all dimensions of furniture</p>
            </div>

            <div class="book" id="book">
                <p>Book</p>
                <label for="weight">Weight(KG):</label>
                <input type="text" name="weight" placeholder="Please enter weight in KG">
                <p>Please enter weight of book</p>
            </div>

        </div>
    </form>

    <script src="./addProductScript.js"></script>
</body>
</html>