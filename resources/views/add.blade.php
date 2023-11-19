<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    /* Styling for the form */
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

    form {
        width: 50%;
        margin: 20px auto;
    }

    .validateMsg {}

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"] {
        width: calc(100% - 10px);
        padding: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        padding: 8px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }


    /* Error message styling */
    .error {
        color: red;
        margin-top: 5px;
    }
    </style>
</head>

<body>
    <div class='container'>
        <div class="title"> <a href="{{route('product.index')}}">Product Store</a> </div>
    </div>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form id="myForm" method="post" action="{{ route('product.store') }}">

        @csrf
        @method('post')

        <div> <label for="name">Name:</label> </div>
        <input type="text" id="name" name="name" placeholder="Your Name" required>


        <label for="qty">Qty:</label>
        <input type="text" id="qty" name="qty" Placeholder="Quantity" required>


        <label for="price">Price:</label>
        <input type="text" id="price" name="price" Placeholder='Price' required>


        <label for="brand">Brand:</label><span class="error" id="brandError"></span>
        <input type="text" id="brand" name="brand" Placeholder='Brand' required>


        <label for="color">Color:</label>
        <input type="text" id="color" name="color" placeholder="Color" required>


        <label for="description">Description:</label>
        <input type="text" id="description" name="description" placeholder='Write Description' required>

        <input type="submit" value="Submit">

    </form>



</body>

</html>