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
                                            <span class="caption-subject"><b>Add Category</b></span>
                                        </div>

                                        

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="actions graph-rp graph-rp-dl">
                                                <p>Add category</p>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <form action="{{route('category.post')}}" method="post">
                                          @csrf
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Category Name">
                                        </div>
                                        
                                        <div class="form-group res-mg-t-15">
                                            <textarea name="description" placeholder="Category Description"></textarea>
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
                            <div class="data-table-area mg-b-15">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sparkline13-list">
                                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Categories <span class="table-project-n">Data</span> Table</h1>
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
                                                <th data-field="name" data-editable="true">Category</th>
                                                <th data-field="description" data-editable="true">Description</th>
                                                <th data-field="edit">Edit</th>
                                                <th data-field="delete">Delete</th>

                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product_categories as $product_category)
                                            <tr>
                                                <td></td>
                                                <td>{{$product_category->id}}</td>
                                                <td>{{$product_category->name}}</td>
                                                <td>{{$product_category->description}}</td>

                                                <td class="datatable-ct">
                                                    <a href="{{ route('category.edit', $product_category->slug)}}" ><i class="fa fa-edit"></i></a>
                                                   
                                                </td>
                                                <td class="datatable-ct">
                                                   
                                                    <a href="" class="" data-toggle="modal" data-target="#deleteClientModal{{ $product_category->id }}"><i class="fa fa-close text-danger "></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                          
                                            
                                        
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
    
   </div>
  </div>

    </div>
    @foreach($product_categories as $modal)
     
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
           <form class="form p-t-20" method="post" action="{{ route('category.delete', $modal->slug)}}" >
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