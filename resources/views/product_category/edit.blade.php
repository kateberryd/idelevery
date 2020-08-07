@extends('admin-layouts.master')
@section('content')

      
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Edit Category</b></span>
                                        </div>

                                        

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="actions graph-rp graph-rp-dl">
                                                <p>Edit category</p>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <form action="{{route('category.update' , $categoryDetail->slug)}}" method="post">
                                        {{ method_field('PUT') }}
                                          @csrf
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Category Name" value="{{$categoryDetail->name}}">
                                        </div>
                                        
                                        <div class="form-group res-mg-t-15">
                                            <textarea name="description" placeholder="Category Description">{{$categoryDetail->description}}</textarea>
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
 
    @endsection