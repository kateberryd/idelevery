@extends('admin-layouts.master')
@section('content')
 
        
        <div class="product-sales-area mg-tb-30 col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b></b></span>
                                        </div>

                                       
                                   
                                    
                                    </div>
                                 </div>
                                
                                
                            </div>
                            <div class="data-table-area mg-b-15">
                                        <div class="container-fluid">
                                       <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                        <div class="main-sparkline13-hd">
                                            <h1> <span class="table-project-n">Data</span> Table</h1>
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
                                                <th data-field="first_name">First Name</th>
                                                <th data-field="last_name" >Last Name</th>
                                                <th data-field="email" >Email Address</th>
                                                <th data-field="edit">Edit</th>
                                                <th data-field="delete">Delete</th>

                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($users->count() > 0)
                                            @foreach($users as $user)
                                            <tr>
                                                <td></td>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>

                                                <td class="datatable-ct">
                                                    <a href="" ><i class="fa fa-edit"></i></a>
                                                   
                                                </td>
                                                <td class="datatable-ct">
                                                   
                                                    <a href="" class="" data-toggle="modal" data-target="#deleteClientModal{{ $user->id }}"><i class="fa fa-close text-danger "></i></a>
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
            
            
            
    
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection