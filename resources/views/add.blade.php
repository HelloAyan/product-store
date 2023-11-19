<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    /* Styling for the form */
    body {
        font-family: Arial, sans-serif;
    }

    form {
        width: 50%;
        margin: 20px auto;
    }

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
    <form id="myForm" onsubmit="return validateForm()" method="post" action="{{ route('product.store') }}">

        @csrf
        @method('post')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <span class="error" id="nameError"></span>

        <label for="qty">Qty:</label>
        <input type="text" id="qty" name="qty" required>
        <span class="error" id="qtyError"></span>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        <span class="error" id="priceError"></span>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>
        <span class="error" id="brandError"></span>

        <label for="color">Color:</label>
        <input type="text" id="color" name="color" required>
        <span class="error" id="colorError"></span>

        <label for="details">Details:</label>
        <input type="text" id="details" name="details" required>
        <span class="error" id="detailsError"></span>

        <input type="submit" value="Submit">
    </form>


    <script>
    function validateForm() {
        let isValid = true;

        const name = document.getElementById('name').value.trim();
        if (name === '') {
            document.getElementById('nameError').innerText = 'Please enter Name';
            isValid = false;
        } else {
            document.getElementById('nameError').innerText = '';
        }

        const qty = document.getElementById('qty').value.trim();
        if (qty === '') {
            document.getElementById('qtyError').innerText = 'Please enter Qty';
            isValid = false;
        } else {
            document.getElementById('qtyError').innerText = '';
        }

        const price = document.getElementById('price').value.trim();
        if (price === '') {
            document.getElementById('priceError').innerText = 'Please enter Price';
            isValid = false;
        } else {
            document.getElementById('priceError').innerText = '';
        }

        const brand = document.getElementById('brand').value.trim();
        if (brand === '') {
            document.getElementById('brandError').innerText = 'Please enter Brand';
            isValid = false;
        } else {
            document.getElementById('brandError').innerText = '';
        }

        const color = document.getElementById('color').value.trim();
        if (color === '') {
            document.getElementById('colorError').innerText = 'Please enter Color';
            isValid = false;
        } else {
            document.getElementById('colorError').innerText = '';
        }

        const details = document.getElementById('details').value.trim();
        if (details === '') {
            document.getElementById('detailsError').innerText = 'Please enter Details';
            isValid = false;
        } else {
            document.getElementById('detailsError').innerText = '';
        }

        return isValid;
    }
    </script>
</body>

</html>