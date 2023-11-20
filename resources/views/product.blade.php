<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Product Details</title>

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
        padding-top: 50px;
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

    .button {
        width: auto;
        height: auto;
    }

    .button button {
        width: auto;
        height: auto;
        border: none;
        margin-bottom: 30px;
        padding: 10px;
        background-color: #E6E4E4;
        cursor: pointer;
        font-size: 17px;
        color: #008000;
    }

    .button button:hover {
        background-color: #008000;
        color: #E6E4E4;
    }
    </style>
</head>


<body>
    <div class='container'>
        <div class="title"> <a href="">Product Store</a> </div>
    </div>

    <div class='table_section'>
        <div class='button'>
            <a href="{{route('product.create')}}">
                <button> Add New Item</button>
            </a>


        </div>
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            @foreach($viewProduct as $items)
            <tbody>
                <tr>
                    <td>{{$items->id }}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->qty}}</td>
                    <td>{{$items->price}}</td>
                    <td>{{$items->brand}}</td>
                    <td>{{$items->color}}</td>
                    <td>{{$items->description}}</td>
                    <td>
                        <a href="{{route('product.edit', ['product' => $items])}}">Edit</a>
                    </td>
                    <td>Delete</td>

                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
    </div>
</body>

</html>