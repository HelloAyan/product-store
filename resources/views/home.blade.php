<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Home</title>

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
        justify-content: space-between;
        background-color: #e6e4e4;
        padding: 0 100px;
    }

    .title {
        font-size: 30px;
        color: green;
    }

    .title a {
        text-decoration: none;
        color: inherit;
    }

    .Product_gallery {
        width: 100%;
        height: auto;
        margin-top: 50px;
        padding: 0 100px;
    }

    .product_item {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }

    .item_section {
        width: auto;
        height: auto;
        display: flex;
        flex-direction: column;
        row-gap: 5px;
        border: 1px solid #80808036;
        padding: 20px 25px;
        border-radius: 5px;
    }

    .image-size {
        max-width: 200px;
        height: auto;
    }

    .item_title {
        font-size: 20px;
        color: green;
    }

    .details_info {
        font-size: 18px;
        color: #2d2c2c;
    }

    .add_to_chart {
        width: 120px;
        height: 30px;
        background-color: green;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        border-radius: 5px;
        cursor: pointer;
    }

    .add_to_chart:hover {
        background-color: #349934;
        color: white;
    }

    .chart_section {
        width: auto;
        height: auto;
        display: flex;
        align-items: center;
        column-gap: 10px;
    }

    .chart_icon {
        width: auto;
        height: auto;
    }

    .chart_icon img {
        width: 30px;
        height: auto;
    }
    </style>
</head>


<body>
    <div class='container'>
        <div class="title"> <a href="{{route('product.home')}}"><img src="{{asset('images/home.svg')}}" alt=""> Home</a>
        </div>
        <div class="title"><a href="{{route('product.index')}}">Admin Panel</a></div>
        <div class='chart_section'>
            <div class='chart_icon'><img src="{{ asset('storage/images/chart.svg') }}" alt="Icon"></div>
            <div class="cart_items"></div> <!-- Container for cart items -->
        </div>

    </div>

    <div class='Product_gallery'>
        <div class='product_item'>
            @foreach($viewProduct as $items)
            <div class='item_section'>
                <div class="item_title">{{$items->name}}</div>
                <div>
                    @if($items->image)
                    <img src="{{ asset('storage/images/' . $items->image) }}" alt="Image" class="image-size">
                    @else
                    <img src="{{ asset('storage/images/phone.jpeg') }}" alt="Image" class="image-size">
                    @endif
                </div>
                <div class="details_info">Price: <span class="price">{{$items->price}}</span></div>
                <div class="details_info">Brand: {{$items->brand}}</div>
                <div class="details_info">Description: {{$items->description}}</div>
                <div class="add_to_chart" data-name="{{$items->name}}" data-price="{{$items->price}}">Add to Chart</div>
            </div>

            @endforeach

        </div>
    </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('.add_to_chart');
        const cartItemsContainer = document.querySelector('.cart_items');
        let totalPrice = 0;
        let itemCount = 0;

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productName = this.getAttribute('data-name');
                const productPrice = parseFloat(this.getAttribute('data-price'));

                totalPrice += productPrice;
                itemCount++;

                const cartItem = document.createElement('div');
                cartItem.textContent = `${productName} - $${productPrice.toFixed(2)}`;

                // Append each new item to the cart items container
                cartItemsContainer.appendChild(cartItem);

                // Update the cart icon content to display total price and item count
                const cartSummary = document.createElement('div');
                cartSummary.textContent = `$${totalPrice.toFixed(2)} (${itemCount} items)`;

                // Clear the cart items container and add the updated cart summary
                cartItemsContainer.innerHTML = '';
                cartItemsContainer.appendChild(cartSummary);
            });
        });
    });
    </script>
</body>

</html>