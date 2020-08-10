@extends('admin-layouts.master')
@section('content')

      
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sparkline13-list">
                                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Products <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
											<option value="">Export Basic</option>
											<option value="all">Export All</option>
											<option value="selected">Export Selected</option>
										</select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="name">Product Name</th>
                                                <th data-field="product_image">Product Image</th>
                                                <th data-field="product_category" >Product Category</th>
                                                <th data-field="product_price">Product Price</th>
                                                <th data-field="product_description">Product Description</th>
                                               
                                                <th data-field="delete">Delete</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($products->count() > 0)
                                            @foreach($products as $product)
                                            <tr>
                                                <td></td>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td><img src="/uploads/products/thumbnails/{{$product->product_image}}" width="50px" height="50px" ></td>
                                                <td>{{$product['product_category']}}</td>
                                                <td>{{$product['product_price']}}</td>
                                                <td>{{$product['product_description']}}</td>

                                                <td class="datatable-ct">
                                                   
                                                    <a href="" class="" data-toggle="modal" data-target="#deleteClientModal{{ $product->id }}" data-toggle="tooltip" title="Delete Client" data-placement="top"><i class="fa fa-close text-danger "></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
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

    @foreach($products as $modal)
     
     <!-- ///////////////////////////////////////// -->
 
     <div class="modal fade bs-example-modal-lg" id="deleteClientModal{{ $modal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title" id="exampleModalLabel1">Warning</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <form class="form p-t-20" method="post" action="{{ route('product.delete', $modal->id)}}" >
             <div class="modal-body">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <input type="hidden" name="id" value="{{ $modal->slug }}">          
 
               <div class="row">
                 <div class="col-md-12">
                   <p>Are you sure you want to delete this product?</p>
                 </div>
               </div>                                 
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-warning">Confirm Delete</button>
             </div>
           </form>
         </div>
       </div>
     </div>
   @endforeach
@endsection