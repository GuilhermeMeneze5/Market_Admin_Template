@extends('layouts.app')

@section('content')

    <head>
        <title>W3.CSS Template</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="/vendor/laravel-filemanager/css/cropper.min.css">

        <!--@######### ADICIONAR ########-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/cloudtables/datatables.min.css') }}">
        <script src='{{asset('assets/cloudtables/jQuery-3.6.0/jquery-3.6.0.min.js')}}'></script>
        <script src='{{asset('assets/cloudtables/datatables.min.js')}}'></script>
        <!--@############################-->
        <style>
            html,
            body,
            h1,
            h2,
            h3,
            h4,
            h5 {
                font-family: "Raleway", sans-serif
            }
        </style>
    </head>

    <body>

        <!-- Side Navigation -->
        <nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;"
            id="mySidebar">
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Register');w3_close();"><i class="fa fa-box test w3-margin-right"></i>Products</a></a>

                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Groups');w3_close();"><i class="fa fa-boxes test w3-margin-right"></i>Categories</a></a>

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Work');w3_close();"><i class="fas fa-briefcase w3-margin-right"></i>Customs</a>

                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Permitions');w3_close();"><i class="fa fa-bookmark w3-margin-right"></i>Offers</a>

            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey"
                onclick="openMail('Tags');w3_close();"><i class="fa fa-tag w3-margin-right"></i>Tags</a>

            <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
                class="w3-bar-item w3-button test w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>

            <a id="myBtn" onclick="myFunc('Demo1')"></a>
            <div id="Demo1" class="w3-hide w3-animate-left">

        </nav>


        <!-- Overlay effect when opening the side navigation on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
            title="Close Sidemenu" id="myOverlay"></div>

        <!-- Page content -->
        <div class="w3-main" style="margin-left:320px;">
            <table style="margin-left:80%;">
                <td class="w3-margin-left w3-margin-right" ><i class="fas fa-reply w3-button w3-hide-large w3-xlarge w3-margin-left  w3-margin-botom" onclick="w3_open()"></i></td>

            </table>


            <div id="Register" class="w3-container person">

                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Products</h5>
                                <table id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>DESC</th>
                                            <th>EDIT</th>
                                            <th>DELET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($products))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            @foreach ($products as $product)
                                            <tr class="alert">
                                                <td value="{{$product->id}}">{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->short_description}}</td>
                                                <td style="display: fix; justify-content: center; align-items: center;"><a href="/editproduct/{{$product->id}}"  data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table>
                                <br>
                                <a href="\test" class="text-center">
                                    <!--<button class="w3-button w3-dark-grey" onclick="document.getElementById('id01').style.display='block'">Add New Product  <i class="fa fa-user-plus"></i></button></a>
                                    -->
 <button class="w3-button w3-dark-grey">Add New Product  <i class="fa fa-user-plus"></i></button></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div id="Groups" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Categories</h5>
                                <table id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>BLOCK</th>
                                            <th>EDIT</th>
                                            <th>DELET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($categories))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            @foreach ($categories as $category)
                                            <tr class="alert">
                                                <td value="{{$category->id}}">{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->blocked}}</td>
                                                <td style="display: fix; justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table><br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id02').style.display='block'">Add New Group  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="Work" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Customs</h5>
                                <table id="myTable3">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>DESC</th>
                                            <th>EDIT</th>
                                            <th>DELET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(empty($customs))
                                        <p>No register found please, register a new user to continue</p>
                                            @else
                                            @foreach ($customs as $custom)
                                            <tr class="alert">
                                                <td value="{{$custom->id}}">{{$custom->id}}</td>
                                                <td>{{$custom->custom_nome}}</td>
                                                <td>{{$custom->blocked}}</td>
                                                <td style="display: fix; justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-pen"  style="color:gray;"></i></a></td>
                                                <td style=" justify-content: center; align-items: center;"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-trash"  style="color:gray;"></i></a></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                    </tbody>
                                </table><br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id03').style.display='block'">Add New Product Custom  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="Permitions" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Permitions</h5>
                                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td></td>
                                            <td>Deleted</td>
                                        <tr>
                                    </thead>
                                    <tbody>

                                        <!-- corpo da tabela -->

                                    </tbody>
                                </table><br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id04').style.display='block'">Add New Permition  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="Tags" class="w3-container person">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="w3-container">
                                <h5>Tags</h5>
                                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Description</td>
                                            <td></td>
                                            <td>Deleted</td>
                                        <tr>
                                    </thead>
                                    <tbody>

                                        <!-- corpo da tabela -->

                                    </tbody>
                                </table><br>
                                <a href="javascript:void(0)" class="text-center"> <button class="w3-button w3-dark-grey" onclick="document.getElementById('id05').style.display='block'">Add New Permition  <i class="fa fa-user-plus"></i></button></a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>
         <!-- Modal that pops up when you click on "New USER" -->
        <div id="id01" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id01').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New Product</h2>
                </div>

                <div class="w3-panel">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">PRODUCT</p>

                            <form method="post" action="{{ route('/create-product') }}" enctype="multipart/form-data">
                                @csrf

<div id="holder"></div>
<div class="">
                                <label>Banner Image</label>
                                <input type="file" name="image1" accept="image/*">
                                  <hr>
                                  <label>Image Product 2</label>
                                  <input type="file" name="image2" accept="image/*">
                                  <br>
                                  <label>Image Product 3</label>
                                  <input type="file" name="image3" accept="image/*">
                                  <br>
                                  <label>Image Product 4</label>
                                  <input type="file" name="image4" accept="image/*">
                                  <br>
                                  <label>Image Product 5</label>
                                  <input type="file" name="image5" accept="image/*">
                                  <br>
                                 <hr>
                                </div>
                                <label>Product Name</label>
                                <div class="input-group mb-3">
                                        <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Product Name">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Product Category</label>
                                <div class="input-group mb-3">
                                    <select type="       textarea"  id="category_id" cols="30" rows="5" class="form-control" name="category_id"
                                         placeholder="Category" required>
                                         <option value="categorie" >-- Select Categorie ---</option>
                                       @foreach ($categories as $categorie)
                                       <option value="{{ $categorie->id }}"> {{ $categorie->name }}</option>
                                   @endforeach
        </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Product Custom 1</label>
                                <div class="input-group mb-3">
                                    <input type="       textarea"  id="custos1_id" cols="30" rows="5" class="form-control" name="custom1_id"
                                         placeholder="Custom 1">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Product Custom 2</label>
                                <div class="input-group mb-3">
                                    <input type="       textarea"  id="custom2_id" cols="30" rows="5" class="form-control" name="custom2_id"
                                         placeholder="Custom 2">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Product Custom 3</label>
                                <div class="input-group mb-3">
                                    <input type="       textarea"  id="custom3_id" cols="30" rows="5" class="form-control" name="custos3_id"
                                         placeholder="Custom 3">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Product Price</label>
                                <div class="input-group mb-3">
                                    <input type="textarea"  id="full_price" cols="30" rows="5" class="form-control" name="full_price"
                                        value="0.00" placeholder="Product Price" type="float">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Discount</label>
                                <div class="input-group mb-3">
                                    <input type="textarea"  id="discount" cols="30" rows="5" class="form-control" name="discount"
                                        value="0" placeholder="Product Price" type="number">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Storage</label>
                                <div class="input-group mb-3">
                                    <input type="textarea"  id="qtd_storage" cols="30" rows="5" class="form-control" name="qtd_storage"
                                        value="0" placeholder="Product Price" type="number">
                                    <div class="input-group-append">
                                        <div class="input-group-text"></div>
                                    </div>

                                </div>
                                <label>Product Short Description</label>
                                <div class="input-group mb-3">
                                <input class="w3-input w3-border w3-margin-bottom" style="height:150px" name="short_description" id="short_description" placeholder="short description" required="">
                                    <div class="input-group-append">

                                    </div>

                                </div>
                                <label>Product Long Description</label>

                                <div class="input-group mb-3">
                                <input class="w3-input w3-border w3-margin-bottom" style="height:150px" name="long_description" id="long_description" placeholder="Long description" required="">
                                    <div class="input-group-append">


                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                                class="fa fa-paper-plane"></i></button>


                                </div>
                            </form>


                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
         <!-- Modal that pops up when you click on "New GROUP" -->

        <div id="id02" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id02').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New Group</h2>
                </div>

                <div class="w3-panel">
                    <div class="card">
                        <form action="{{ route('/create-categorie') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <label>Category image</label>
                                  <input type="file" name="image" accept="image/*" required>
                            <br>
                            <hr>
                            <label>Category Name</label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" name='namecategories' id='namecategories'
                                required>

                            <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Send <i
                                class="fa fa-paper-plane"></i></button>
                        </form>
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
                 <!-- Modal that pops up when you click on "New WORK CHARGE" -->



        <div id="id03" class="w3-modal" style="z-index:4;Position: absolute;">

            <div class="w3-modal-content w3-animate-zoom">
                <form action="{{ route('/create-custom') }}" method="post">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id03').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>New Work Charge</h2>
                </div>
                    <div class="w3-section">
                        <div class="w3-panel">
                            <label>Custom Name</label>
                            <input name="name_custom" id="name_custom" class="w3-input w3-border w3-margin-bottom"
                                type="text" required>


                                                                 <!--**SCRIPT TO CHOSE PERIOD**- -->
                                           <!-- SET BREAK TIME -->
                                           <div>
                                            &nbsp;&nbsp;&nbsp;<input type="checkbox" class="checkbox" value="1" name="status_option_1" id="status_option_1">&nbsp;Option 1
                                            <div class="div_box">
                                            <input name="txt_option_1" id="txt_option_1" class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                <div class = 'card '>

                                                </div>
                                                <hr>
                                                <input type="checkbox" class="checkbox" value="1" name="status_option_2" id="status_option_2">&nbsp;Option 2
                                                <div class="div_box2">
                                                <input name="txt_option_2" id="txt_option_2" class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox " value="1" name="status_option_3" id="status_option_3" >&nbsp;Option 3

                                                 <div class="div_box3">
                                                 <input name="txt_option_3" id="txt_option_3"  class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" value="1" name="status_option_4" id="status_option_4">&nbsp;Option 4

                                                 <div class="div_box4">
                                                 <input class="w3-input w3-border w3-margin-bottom" name="txt_option_4" id="txt_option_4"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" value="1" name="status_option_5" id="status_option_5" >&nbsp;Option 5

                                                 <div class="div_box5">
                                                 <input name="txt_option_5" id="txt_option_5"class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" value="1" name="status_option_6" id="status_option_6" >&nbsp;Option 6
                                                 <div class="div_box6">
                                                 <input name="txt_option_6" id="txt_option_6"class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" value="1" name="status_option_7" id="status_option_7" >&nbsp;Option 7

                                                 <div class="div_box7">
                                                 <input name="txt_option_7" id="txt_option_7"class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" value="1" name="status_option_8" id="status_option_8" >&nbsp;Option 8

                                                 <div class="div_box8">
                                                 <input name="txt_option_8" id="txt_option_8" class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>
                                                 <input type="checkbox" class="checkbox" value="1" name="status_option_9" id="status_option_9" >&nbsp;Option 9

                                                 <div class="div_box9">
                                                 <input name="txt_option_9" id="txt_option_9" class="w3-input w3-border w3-margin-bottom"
                                type="text" >
                                                  <div class = 'card '>

                                                  </div>
                                                  <hr>

                                                </div>
                                                </div>
                                                </div>
                                                </div>

                                                </div>
                                                </div>
                                                </div>                                                </div>
                                              </div>
                                              <style>
                                                .div_box {
                                                  padding: 10px;
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box {
                                                  display: block;
                                                }
                                                  .div_box2 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box2 {
                                                  display: block;
                                                }
                                                  .div_box3 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box3 {
                                                  display: block;
                                                }
                                                .div_box4 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box4 {
                                                  display: block;
                                                }
                                                .div_box5 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box5 {
                                                  display: block;
                                                }
                                                .div_box6 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box6 {
                                                  display: block;
                                                }
                                                .div_box7 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box7 {
                                                  display: block;
                                                }
                                                .div_box8 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box8 {
                                                  display: block;
                                                }
                                                .div_box9 {
                                                  display: none;
                                                }

                                                .checkbox:checked + .div_box9 {
                                                  display: block;
                                                }
                                              </style>
                                        </div>
                                    </div>
                                    <!-- END BREAK TIME-->




                <div class="w3-panel">
                    <div class="card">

                            @csrf
                            <button type="submit" class="btn btn-primary btn-block we-right" value="Send">Resume <i
                                class="fa fa-paper-plane"></i></button>
        </form>
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Modal that pops up when you click on "New PERMITION" -->

        <div id="id04" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id04').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>Offers</h2>
                </div>
                <div class="w3-panel">
                    <div class="">

                        teste
                    </div><!-- /.card -->

                </div>
                </div>
            </div>
        </div>
        <div id="id05" class="w3-modal" style="z-index:4;Position: absolute;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                    <span
                        onclick="document.getElementById('id05').style.display='none'"class="w3-button w3-red w3-right "><i
                            class="fa fa-remove">X</i></span>
                    <h2>Tags</h2>
                </div>
                <div class="w3-panel">
                    <div class="">

                        teste
                    </div><!-- /.card -->

                </div>
                </div>
            </div>
        </div>
        <script>
            var openInbox = document.getElementById("myBtn");
            openInbox.click();

            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }

            function myFunc(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-red";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                        x.previousElementSibling.className.replace(" w3-red", "");
                }
            }

            openMail("Register")
            function openMail(personName) {
                var i;
                var x = document.getElementsByClassName("person");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x = document.getElementsByClassName("test");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" w3-light-grey", "");
                }
                document.getElementById(personName).style.display = "block";
            }
            openMail("Tags")
            function openMail(personName) {
                var i;
                var x = document.getElementsByClassName("person");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x = document.getElementsByClassName("test");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" w3-light-grey", "");
                }
                document.getElementById(personName).style.display = "block";
            }
        </script>
           <!--@######### ADICIONAR ########-->

      <script>
        $(document).ready(function() {
             $('#myTable1').DataTable();
             $('#myTable2').DataTable();
             $('#myTable3').DataTable();
             $('#myTable4').DataTable();
         });
         </script>
     <!--@#################-->
    </body>
@endsection
