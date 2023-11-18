<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Product Details</title>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #e6e4e4;
}

.title {
    font-size: 30px;
    color: green;
}

.title a {
    text-decoration: none;
    color: inherit;
}

.table_section {
    width: 80%;
    height: auto;
    padding-top: 100px;
    margin: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

tr:nth-child(odd) {
    background-color: white;
}

tr:nth-child(even) {
    background-color: lightgray;
}

th {
    background-color: #f2f2f2;
}
</style>

<body>
    <div class='container'>
        <div class="title"> <a href="">Product Store</a> </div>
    </div>

    <div class='table_section'>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Product A</td>
                    <td>5</td>
                    <td>$10</td>
                    <td>Brand X</td>
                    <td>Red</td>
                    <td>Some details</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Product B</td>
                    <td>10</td>
                    <td>$20</td>
                    <td>Brand Y</td>
                    <td>Blue</td>
                    <td>More details</td>
                </tr>

            </tbody>
        </table>

    </div>
    </div>
</body>

</html>