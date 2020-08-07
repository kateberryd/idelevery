@extends('vendor-layouts.master')
@section('content')

      
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Edit Product</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="{{route('product.update' , $productDetail->id)}}" class=" add-professors" method="post" id="demo1-upload" enctype="multipart/form-data"  >
                                                    {{ method_field('PUT') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="product_name" type="text" class="form-control" placeholder="Product Name" value="{{$productDetail->product_name}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="product_price" type="text" class="form-control" placeholder="Product Price"  value="{{$productDetail->product_price}}">
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <input name="product_price" type="text" class="form-control" placeholder="Product Price">
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <select name="product_category" class="form-control">
                                                                        <option value="none" selected="" disabled=""> {{$productDetail->product_category}}</option>
                                                                        @foreach($product_categories as $product_category)
																		<option value="{{$product_category->name}}">{{$product_category->name}}</option>
                                                                        @endforeach
																	</select>
                                                                </div>

                                                                 <div class="form-group res-mg-t-15">
                                                                    <textarea name="product_description" type="text" placeholder="Product Description"  value="{{$productDetail->product_name}}">{{$productDetail->product_description}}</textarea>
                                                                </div>
                                                                <div class="form-group 3">
                                                                    <img src="/uploads/products/thumbnails/{{$productDetail->product_image}}" alt="">
                                                                </div>
                                                                <div class="form-group alert-up-pd">
                                                                    <div class="dz-message needclicks download-custom">
                                                                        <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                        <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                        <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                        <input name="product_image" class="" type="file" >

                                                                        </p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                           
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
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
                </div>
            </div>
        </div>


      
        </div>
        <!-- <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
@endsection