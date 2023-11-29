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

    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 100%;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #e6e4e4;
        padding: 0 135px;
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
        margin: 50px auto 0 auto;
        display: flex;
        flex-direction: column;

    }

    label {
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: calc(100% - 10px);
        padding: 5px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        width: 100px;
        height: auto;
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
    </style>
</head>

<body>
    <div class='container'>
        <div class="title"> <a href="{{route('product.home')}}">Home</a> </div>
        <div class="title"> <a href="{{route('product.index')}}">Product Store</a> </div>
        <div></div>
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
    <form id="myForm" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">

        @csrf
        @method('post')

        <div> <label for="name">Name:</label> </div>
        <input type="text" id="name" name="name" placeholder="Your Name" required>


        <label for="qty">Quantity:</label>
        <input type="text" id="qty" name="qty" Placeholder="Quantity" required>


        <label for="price">Price:</label>
        <input type="text" id="price" name="price" Placeholder='Price' required>


        <label for="brand">Brand:</label><span class="error" id="brandError"></span>
        <input type="text" id="brand" name="brand" Placeholder='Brand' required>


        <label for="color">Color:</label>
        <input type="text" id="color" name="color" placeholder="Color" required>

        <div style="display: flex; align-items: center;">
            <label for="image" style="margin-right: 10px;">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <img id="imagePreview" src="#" alt="Image Preview"
                style="max-width: 100px; display: none; padding-right: 10px">
        </div>


        <label for="description">Description:</label>
        <input type="text" id="description" name="description" placeholder='Write Description' required>

        <input type="submit" value="Submit">

    </form>


    <script>
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            });

            reader.readAsDataURL(file);
        }
    });
    </script>



</body>

</html>