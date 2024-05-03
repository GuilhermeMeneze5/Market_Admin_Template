@extends('layouts.app')

@section('content')

    <head>
        <meta charset="utf-8">
        <title>MultiShop - Online Shop Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Topbar Start -->
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <!-- Navbar End -->


        <!-- Breadcrumb Start -->

        <!-- Breadcrumb End -->


        <!-- Shop Detail Start
                <div class="w3-col m6">
                    <img class="w3-image w3-round-large"  src="/assets/images/adminpapper.jpg" alt="Buildings" width="500px" height="500  px">
                    <img class="w3-image w3-round-large"  src="/img/product/{{ $product->image1 }}" alt="Buildings" width="500px" height="500  px">

                </div>-->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    @if ($product->image1 || $product->image2 || $product->image3 || $product->image4 || $product->image5)
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner bg-light">
                                @php
                                    $images = [$product->image1, $product->image2, $product->image3, $product->image4, $product->image5];
                                    $active = true;
                                @endphp
                                @foreach ($images as $image)
                                    @if (empty($image))
                                    @else
                                        @if ($image)
                                            <div style="width: 400px; height: 400px;"
                                                class="carousel-item {{ $active ? 'active' : '' }}">
                                                <img class="w-100 h-100" src="/img/product/{{ $image }}"
                                                    alt="Image">
                                            </div>

                                            @php
                                                $active = false;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                                <i class="fa fa-2x fa-angle-left text-dark"></i>
                            </a>
                            <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                                <i class="fa fa-2x fa-angle-right text-dark"></i>
                            </a>
                        </div>
                    @endif
                </div>


                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3>{{ $product->name }}</h3>
                        <div class="d-flex mb-3" id="ratingContainer">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star" data-value="1"></small>
                                <small class="fas fa-star" data-value="2"></small>
                                <small class="fas fa-star" data-value="3"></small>
                                <small class="fas fa-star-half-alt" data-value="4"></small>
                                <small class="far fa-star" data-value="5"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>

                        <style>
                            .fas.fa-star,
                            .fas.fa-star-half-alt {
                                cursor: pointer;
                            }

                            .fas.fa-star,
                            .fas.fa-star-half-alt,
                            .far.fa-star {
                                transition: color 0.3s;
                            }

                            .filled {
                                color: gold;
                            }
                        </style>

                        <script>
                            const ratingContainer = document.getElementById('ratingContainer');
                            const stars = ratingContainer.querySelectorAll('.fas.fa-star, .fas.fa-star-half-alt, .far.fa-star');

                            stars.forEach(star => {
                                star.addEventListener('mouseenter', () => {
                                    const value = star.getAttribute('data-value');
                                    for (let i = 1; i <= 5; i++) {
                                        if (i <= value) {
                                            ratingContainer.querySelector(`[data-value="${i}"]`).classList.add('filled');
                                        } else {
                                            ratingContainer.querySelector(`[data-value="${i}"]`).classList.remove('filled');
                                        }
                                    }
                                });
                            });
                        </script>

                        @if ($product->discount > 0)
                            <table>
                                <td>
                                    <h3 class="font-weight-semi-bold mb-4">{{ $product->discount_price }} </h3>
                                </td>
                                <td>
                                    <h6 class="text-muted ml-2"><del>{{ $product->full_price }}</del></h6>
                                </td>
                            </table>
                        @else
                            <h3 class="font-weight-semi-bold mb-4">{{ $product->full_price }} </h3>
                        @endif

                        <p class="mb-4">
                            {{ $product->short_description }}
                        </p>
                        <div class="d-flex mb-3">
                            <!-- Add Produto ao carrinho-->
                            <form action="{{ route('addToCart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input value={{ $product->image1 }} name="image1" id="image1" style="display:none;"
                                    required>
                                <input value={{ Auth::user()->id }} name="user_id" id="user_id" style="display:none;"
                                    required>
                                <input value={{ $product->id }} name="product_id" id="product_id" style="display:none;"
                                    required>
                                <input value={{ $product->name }} name="product_name" id="product_name"
                                    style="display:none;" required>
                                <input value={{ $product->full_price }} name="product_price" id="product_price"
                                    style="display:none;" required>
                                <input value={{ $product->discount_price }} name="discount_price" id="discount_price"
                                    style="display:none;" required>

                                @if ($custom1)
                                    <div class="d-flex mb-3">
                                        <label> {{ $custom1->custom_nome }}:</label>&nbsp;
                                        <hr><br>
                                        @for ($i = 1; $i <= 9; $i++)
                                            @php
                                                $customValue = 'custom_valor' . $i;
                                            @endphp
                                            @if ($custom1->$customValue)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input"
                                                        id="size-{{ $i }}" name="custom1"
                                                        value="{{ $custom1->$customValue }}">
                                                    <label class="custom-control-label"
                                                        for="size-{{ $i }}">{{ $custom1->$customValue }}</label>
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                @endif
                                @if ($custom2)
                                    <div class="d-flex mb-3">
                                        <label> {{ $custom2->custom_nome }}:</label>&nbsp;
                                        <hr><br>
                                        @for ($i = 1; $i <= 9; $i++)
                                            @php
                                                $customValue = 'custom_valor' . $i;
                                            @endphp
                                            @if ($custom2->$customValue)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input"
                                                        id="size-{{ $i }}" name="custom2"
                                                        value="{{ $custom2->$customValue }}">
                                                    <label class="custom-control-label"
                                                        for="size-{{ $i }}">{{ $custom2->$customValue }}</label>
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                @endif
                                @if ($custom3)
                                    <div class="d-flex mb-3">
                                        <label> {{ $custom3->custom_nome }}:</label>&nbsp;
                                        <hr><br>
                                        @for ($i = 1; $i <= 9; $i++)
                                            @php
                                                $customValue = 'custom_valor' . $i;
                                            @endphp
                                            @if ($custom3->$customValue)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input"
                                                        id="size-{{ $i }}" name="custom3"
                                                        value="{{ $custom3->$customValue }}">
                                                    <label class="custom-control-label"
                                                        for="size-{{ $i }}">{{ $custom3->$customValue }}</label>
                                                </div>
                                            @endif
                                        @endfor
                                    </div>
                                @endif



                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">

                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control bg-secondary border-0 text-center"
                                    value="1" min="1" name="itemQuantity" id="itemQuantity">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>


                            <button class="btn btn-primary px-3" id="addToCartBtn" type="submit"><i
                                    class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                        </div>
                        </form>



                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Share on:</strong>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab"
                                href="#tab-pane-1">Description</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews ({{ count($reviews) }})</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">Product Description</h4>
                                {{ $product->long_description }}
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <h4 class="mb-3">Additional Information</h4>

                                {{ $product->additional_information }}
                                <div class="row">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4">{{ count($reviews) }} review for "{{ $product->name }}"</h4>
                                        <hr style="border-top: 1px solid #8f8b8b; width: 50%;"> <!-- Defina a largura para 50% -->

                                        @foreach ($reviews as $review)
                                            @if (empty($review))
                                                <p>No register found, please register a new user to continue</p>
                                            @else
                                            <div class="card-footer card-comments" style="margin: 0; padding: 0; border: none;">
                                                <div class="card">
                                                    <div class="card-comment card-gray" style="margin:10px;">
                                                        <div class="comment-text">

                                                        <span class="username">{{ $review->user_name }}
                                                            <span class="text-muted float-right">{{ $review->created_at }}</span>
                                                        </span>
                                                        <!--<div class="text-primary mb-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>-->
                                                        <p>{{$review->text1}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-4">Leave a review</h4>
                                        <small>Your email address will not be published. Required fields are marked
                                            *</small>

                                        <form method="POST" action="{{ route('saveReview') }}">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ Auth::user()->name }}" name="user_name">
                                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                                            <div class="form-group">
                                                <label for="message">Your Review *</label>
                                                <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Leave Your Review"
                                                    class="btn btn-primary px-3">
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->


        <!-- Products Start -->
        <!-- Products End -->


        <!-- Footer Start -->
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>


        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <!-- my funcs -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const minusBtn = document.querySelector('.btn-minus');
                const plusBtn = document.querySelector('.btn-plus');
                const quantityInput = document.getElementById('itemQuantity');

                minusBtn.addEventListener('click', function() {
                    if (quantityInput.value > 1) {
                        quantityInput.value = parseInt(quantityInput.value) - 1;
                    }
                });

                plusBtn.addEventListener('click', function() {
                    quantityInput.value = parseInt(quantityInput.value) + 1;
                });
            });
        </script>
    </body>

@endsection
