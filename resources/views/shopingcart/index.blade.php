@extends('ui-layouts.master')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
        @if(Cart::count( )> 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                           @if(cart::count() > 0)
                            @foreach(Cart::content() as $item)
                           
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="/uploads/products/thumbnails/{{$item->model->product_image}}" alt="">
                                        <h5>{{$item->model->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    &#8358;{{$item->model->product_price}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <span class="dec qtybtn" id="dec"  >-</span>
                                                <input type="text" value="{{$item->qty}}"  class="qtyinput" data-id="{{$item->rowId}}">
                                                <span  class="inc qtybtn qtyinc"  >+</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                    &#8358;{{Cart::priceTotal()}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                       <form action="{{route('cart.delete', $item->rowId)}}" method="post">
                                       
                                        {{ csrf_field() }}
                                         {{ method_field('GET') }}
                                            <input type="hidden" name="id" value="{{ $item->rowId }}">          

                                        <button type="submit" class="icon_close"></button>
                                       </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else

                <h3>No items in cart</h3>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/shop-grid" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span> &#8358;{{Cart::subtotal()}}</span></li>
                            <li>Tax <span> &#8358;{{Cart::tax()}}</span></li>
                            <li>Total <span>&#8358;{{Cart::total()}}</span></li>
                        </ul>
                        <a href="{{route('checkout.index')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection

  @section('extra-js')
  <script src="{{asset('/js/app.js')}}" ></script>
@endsection