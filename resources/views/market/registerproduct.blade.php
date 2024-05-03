@extends('layouts.app')

@section('content')

    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Snippet - BBBootstrap</title>

        <link href='{{ asset('assets/Trumbowyg-main/dist/ui/trumbowyg.min.css') }}' rel='stylesheet' />
        <link rel="stylesheet" href="{{ mix('css/vendor.css') }}">
        <script src='{{ asset('assets/cloudtables/jQuery-3.6.0/jquery-3.6.0.min.js') }}'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <style>
            ::-webkit-scrollbar {
                width: 8px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            * {
                margin: 0;
                padding: 0;
            }

            html {
                height: 100%;
            }

            p {
                color: grey;
            }

            #heading {
                text-transform: uppercase;
                color: #007bff;
                font-weight: normal;
            }

            #msform {
                text-align: center;
                position: relative;
                margin-top: 20px;
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0.5rem;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                padding-bottom: 20px;

                /*stacking fieldsets above each other*/
                position: relative;
            }

            .form-card {
                text-align: left;
            }

            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }

            #msform input,
            #msform textarea {
                padding: 8px 15px 8px 15px;
                border: 1px solid #ccc;
                border-radius: 0px;
                margin-bottom: 25px;
                margin-top: 2px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                color: #2C3E50;
                background-color: #ECEFF1;
                font-size: 16px;
                letter-spacing: 1px;
            }

            #msform input:focus,
            #msform textarea:focus {
                -moz-box-shadow: none !important;
                -webkit-box-shadow: none !important;
                box-shadow: none !important;
                border: 1px solid #007bff;
                outline-width: 0;
            }

            /*Next Buttons*/
            #msform .action-button {
                width: 100px;
                background: #007bff;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 0px 10px 5px;
                float: right;
            }

            #msform .action-button:hover,
            #msform .action-button:focus {
                background-color: #311B92;
            }

            /*Previous Buttons*/
            #msform .action-button-previous {
                width: 100px;
                background: #616161;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 0px;
                cursor: pointer;
                padding: 10px 5px;
                margin: 10px 5px 10px 0px;
                float: right;
            }

            #msform .action-button-previous:hover,
            #msform .action-button-previous:focus {
                background-color: #000000;
            }

            /*The background card*/
            .card {
                z-index: 0;
                border: none;
                position: relative;
            }

            /*FieldSet headings*/
            .fs-title {
                font-size: 25px;
                color: #007bff;
                margin-bottom: 15px;
                font-weight: normal;
                text-align: left;
            }

            .purple-text {
                color: #007bff;
                font-weight: normal;
            }

            /*Step Count*/
            .steps {
                font-size: 25px;
                color: gray;
                margin-bottom: 10px;
                font-weight: normal;
                text-align: right;
            }

            /*Field names*/
            .fieldlabels {
                color: gray;
                text-align: left;
            }

            /*Icon progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey;
            }

            #progressbar .active {
                color: #007bff;
            }

            #progressbar li {
                list-style-type: none;
                font-size: 15px;
                width: 25%;
                float: left;
                position: relative;
                font-weight: 400;
            }
            #progressbar #account:before {
    font-family: Arial, sans-serif; /* Use uma fonte que suporte emojis, como Arial */
    content: "\1F4D5";
}

#progressbar #personal:before {
    font-family: Arial, sans-serif;
    content: "\1F4D6";
}

#progressbar #payment:before {
    font-family: Arial, sans-serif;
    content: "\1F4F7";
}

#progressbar #confirm:before {
    font-family: Arial, sans-serif;
    content: "\2705";
}

            /*Icon ProgressBar before any progress*/
            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 20px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px;
            }

            /*ProgressBar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1;
            }

            /*Color number of the step and the connector before it*/
            #progressbar li.active:before,
            #progressbar li.active:after {
                background: #007bff;
            }

            /*Animated Progress Bar*/
            .progress {
                height: 20px;
            }

            .progress-bar {
                background-color: #007bff;
            }

            /*Fit image in bootstrap div*/
            .fit-image {
                width: 100%;
                object-fit: cover;
            }
        </style>

    </head>

    <body className='snippet-body'>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl text-center p-0 mt-3 mb-2">
                    <div class="card card-body register-card-body">
                        <h2 id="heading">Add New Product</h2>
                        <p>Fill all form field to go to next step</p>


                        <form id="msform" method="post" action="{{ route('/create-product') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Basic Info </strong></li>
                                <li id="personal"><strong>Specifications</strong></li>
                                <li id="payment"><strong>Images</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <br>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">basic information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 1 - 4</h2>
                                        </div>
                                    </div>

                                    <label>Product Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Product Name">


                                    </div>
                                    <label>Product Category</label>
                                    <div class="input-group mb-3">
                                        <select id="category_id" cols="30" rows="5" class="form-control"
                                            name="category_id" placeholder="Category" required>
                                            <option value="categorie" disabled>-- Select Categorie ---</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}"> {{ $categorie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <label>Product Custom 1</label>
                                    <div class="input-group mb-3">
                                        <select id="custos1_id" cols="30" rows="5" class="form-control"
                                            name="custom1_id" placeholder="Custom 1">
                                            <option value="0">-- Select Categorie ---</option>
                                            @foreach ($customs as $custom)
                                                <option value="{{ $custom->id }}"> {{ $custom->custom_nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label>Product Custom 2</label>
                                    <div class="input-group mb-3">
                                        <select id="custom2_id" cols="30" rows="5" class="form-control"
                                            name="custom2_id" placeholder="Custom 2">
                                            <option value="0">-- Select Categorie ---</option>
                                            @foreach ($customs as $custom)
                                                <option value="{{ $custom->id }}"> {{ $custom->custom_nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label>Product Custom 3</label>
                                    <div class="input-group mb-3">
                                        <select id="custom3_id" cols="30" rows="5" class="form-control"
                                            name="custos3_id" placeholder="Custom 3">
                                            <option value="0">-- Select Categorie ---</option>
                                            @foreach ($customs as $custom)
                                                <option value="{{ $custom->id }}"> {{ $custom->custom_nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label>Product Price</label>
                                    <div class="input-group mb-3">
                                        <input type="textarea" id="full_price" cols="30" rows="5"
                                            class="form-control" name="full_price" value="0.00"
                                            placeholder="Product Price" type="float">


                                    </div>
                                    <label>Discount ('%')</label>
                                    <div class="input-group mb-3">
                                        <input type="textarea" id="discount" cols="30" rows="5"
                                            class="form-control" name="discount" value="0" placeholder="Product Price"
                                            type="number">


                                    </div>
                                    <label>Storage</label>
                                    <div class="input-group mb-3">
                                        <input type="textarea" id="qtd_storage" cols="30" rows="5"
                                            class="form-control" name="qtd_storage" value="0"
                                            placeholder="Product Price" type="number">

                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Personal Information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 2 - 4</h2>
                                        </div>
                                    </div>

                                    <label>Product Short Description</label>
                                    <textarea name="short_description" id="short_description" rows="5" placeholder="Conteudo do artigo"></textarea>


                                    <label>Product Long Description</label>
                                    <input class="w3-input w3-border w3-margin-bottom" style="height:150px"
                                        name="long_description" id="long_description" placeholder="Long description"
                                        required="">

                                    <label>Additional information\specifications</label>
                                    <textarea class="trumbowyg" id="myTextarea" name="myTextarea"></textarea>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Images Upload:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div>
                                    </div>
                                    <label class="fieldlabels">Upload Your Peoduct Photo:</label>
                                    <div class="">
                                        <label>Banner Image</label>
                                        <input type="file" name="image1" accept="image/*">
                                        <r>
                                            <label>Image Product 2</label>
                                            <input type="file" name="image2" accept="image/*">
                                            <label>Image Product 3</label>
                                            <input type="file" name="image3" accept="image/*">
                                            <label>Image Product 4</label>
                                            <input type="file" name="image4" accept="image/*">
                                            <label>Image Product 5</label>
                                            <input type="file" name="image5" accept="image/*">
                                            <br>
                                    </div>

                                </div>
                                <button type="submit" class="next action-button" value="Send">Create !<i
                                        class="fa fa-paper-plane"></i></button>
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Finish:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 4 - 4</h2>
                                        </div>
                                    </div>
                                    <br><br>
                                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                    <br>
                                    <div class="row justify-content-center">

                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">A New Product Has Been Added To Your Store
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type='text/javascript'>
            $(document).ready(function() {

                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;
                var current = 1;
                var steps = $("fieldset").length;

                setProgressBar(current);

                $(".next").click(function() {

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(++current);
                });

                $(".previous").click(function() {

                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();

                    //Remove class active
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                    //show the previous fieldset
                    previous_fs.show();

                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            previous_fs.css({
                                'opacity': opacity
                            });
                        },
                        duration: 500
                    });
                    setProgressBar(--current);
                });

                function setProgressBar(curStep) {
                    var percent = parseFloat(100 / steps) * curStep;
                    percent = percent.toFixed();
                    $(".progress-bar")
                        .css("width", percent + "%")
                }

                $(".submit").click(function() {
                    return false;
                })

            });
        </script>
        <script type='text/javascript'>
            var myLink = document.querySelector('a[href="#"]');
            myLink.addEventListener('click', function(e) {
                e.preventDefault();
            });
        </script>

    </body>
@endsection
