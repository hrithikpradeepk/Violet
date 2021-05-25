@extends('ctheme')
@section('content')

    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Cart<span></span></h2>
                    
                    </div>
                </div>
               
                <div class="col-lg-8">
              
                           
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h"><h3>Product</h3></th>
                            <th><h3>Price</h3></th>
                            <th><h3>Quantity</h3></th>
                            <th><h3>Total</h3></th>
                            <th><h3>Remove</h3></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach( $test as $cart)
                        <tr>
                            <td class="product-col">
                            <img src="{{ URL::asset('assets/images/'.$cart->product->Productimage) }}" alt="">
                                <div class="p-title">
                                    <h5>{{$cart->product->Productname}}</h5>
                                </div>
                            </td>
                        
                            <td class="price-col">{{$cart->product->price}}</td>
                            <td class="price-col">{{$cart->qty}}</td>
                            <td class="price-col">{{$cart->total}}</td>
                            <td>  <a onclick="return confirm('Are you sure?')" href="{{"/deleteitem/".$cart->id}}"><div class="site-btn ">X</div></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                       
                    </div>
                    <div class="col-lg-12 text-center">
                    <a onclick="return confirm('Are you sure?')" href="/deletecart"><div class="site-btn chechout-btn"> Clear Cart</div></a>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-method">
            <div class="container">
             
                    <div class="col-lg-12">
                                <h2><center>Total Amount</center</h2><BR>
                              <td>  <h4><center>₹{{$total}}</center</h4></td>
                                <br>
                            </div>
                        </div>
                        <div class="total-info">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="/checkoutt" class="primary-btn chechout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page Section End -->

 @endsection