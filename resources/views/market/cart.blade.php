@extends('layouts.app')

@section('content')
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


    </head>

    <body>


        <!-- Navbar Start -->
        @include('layouts.shopmenu')

        <!-- Navbar End -->

        <!-- Cart Start -->
        <div class="container-fluid" style="margin-top:50px">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($cart_items as $cart_item)
                                <tr>
                                    <td class="align-middle"><img src="img/product-1.jpg" alt=""
                                            style="width: 50px;"> {{ $cart_item->product_name }}</td>
                                    <td class="align-middle"> {{ $cart_item->preco_unitario }}</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mr-3" style="width: 130px;">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-minus"
                                                    data-item-id="{{ $cart_item->id }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="number" class="form-control bg-secondary border-0 text-center"
                                                value={{ $cart_item->quantidade }} min="1" name="itemQuantity"
                                                id="itemQuantity-{{ $cart_item->id }}">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary btn-plus"
                                                    data-item-id="{{ $cart_item->id }}">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">$150</td>
                                    <td class="align-middle"><button class="btn btn-sm btn-danger"><i
                                                class="fa fa-times"></i></button></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <form class="mb-30" action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form>
                    <h5 class="section-title position-relative text-uppercase mb-3" style="margin-top:25px;"><span
                            class="bg-secondary pr-3">Cart Summary</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>$150</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>$160</h5>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To
                                Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const minusBtns = document.querySelectorAll('.btn-minus');
                const plusBtns = document.querySelectorAll('.btn-plus');
                const quantityInputs = document.querySelectorAll('[name="itemQuantity"]');

                minusBtns.forEach(function(minusBtn) {
                    minusBtn.addEventListener('click', function() {
                        const itemId = this.getAttribute('data-item-id');
                        const quantityInput = document.getElementById('itemQuantity-' + itemId);

                        if (quantityInput.value > 1) {
                            quantityInput.value = parseInt(quantityInput.value) - 1;
                        }
                    });
                });

                plusBtns.forEach(function(plusBtn) {
                    plusBtn.addEventListener('click', function() {
                        const itemId = this.getAttribute('data-item-id');
                        const quantityInput = document.getElementById('itemQuantity-' + itemId);

                        quantityInput.value = parseInt(quantityInput.value) + 1;
                    });
                });
            });
        </script>

    </body>
@endsection
