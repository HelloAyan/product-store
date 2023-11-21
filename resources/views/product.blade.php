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

    .edit {
        width: auto;
        height: auto;
    }

    .edit a {
        width: auto;
        height: auto;
        background-color: #E6E4E4;
        cursor: pointer;
        color: #008000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3px;
        text-decoration: none;
    }

    .edit a:hover {
        background-color: #008000;
        color: #E6E4E4;
    }

    .delete {
        width: auto;
        height: auto;
    }

    .delete input {
        width: auto;
        height: auto;
        background-color: #E6E4E4;
        cursor: pointer;
        color: #cc0606;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4px 7px;
        border: none;
        font-size: 14px;
    }

    .delete input:hover {
        background-color: #cc0606;
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

            @php
            $counter = 1;
            @endphp

            @foreach($viewProduct as $items)
            <tbody>
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$items->name}}</td>
                    <td>{{$items->qty}}</td>
                    <td>{{$items->price}}</td>
                    <td>{{$items->brand}}</td>
                    <td>{{$items->color}}</td>
                    <td>{{$items->description}}</td>
                    <td class="edit">
                        <a href="{{route('product.edit', ['product' => $items])}}">Edit</a>
                    </td>
                    <td>
                        <form method='post' action="{{route('product.delete', ['product' => $items])}}"
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('delete')
                            <div class="delete"> <input type="submit" value="Delete"> </div>
                        </form>
                    </td>

                </tr>
            </tbody>
            @php
            $counter++; // Increment the counter for the next row
            @endphp
            @endforeach
        </table>

    </div>
    </div>
</body>

</html>