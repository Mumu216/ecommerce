@extends('frontend.layout.template')

@section('body-content')

			<div role="main" class="main shop py-4">

				<div class="container">

					<div class="row">
						<div class="col">
							<p>Returning customer? <a href="shop-login.html">Click here to login.</a></p>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-9">
                            <div class="accordion accordion-modern" id="accordion">
                                <form action="{{ route('make_payment') }}" method="POST" id="frmShippingAddress" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}"  name="_token" >
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Fillup the Shipping Address to complete The Order
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="collapse show">
										<div class="card-body">
												<div class="form-row">
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">First Name</label>
														<input type="text" value="@if( Auth::check()) {{ Auth::user()->name }} @endif" name="first_name" class="form-control">
													</div>
													<div class="form-group col-lg-6">
														<label class="font-weight-bold text-dark text-2">Last Name</label>
														<input type="text" value="" name="last_name" class="form-control">
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Email Address</label>
														<input type="text" value="@if( Auth::check()) {{ Auth::user()->email }} @endif" name="email" class="form-control">
													</div>

                                                    <div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Phone</label>
														<input type="text" value="@if( Auth::check()) {{ Auth::user()->phone }} @endif" name="phone" class="form-control">
													</div>
												</div>

                                                <div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Shipping Address [Flat No, House No, Road No]</label>
														<input type="text" value="@if( Auth::check()) {{ Auth::user()->address }} @endif" name="address" class="form-control">
													</div>
												</div>

                                                <div class="form-row">
                                                    <div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Division</label>
														 <select class="form-control" name="division_id">
                                                          <option>Please Select Your Division</option>
                                                          @foreach($divisions as $division)
                                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                          @endforeach
                                                        </select>
													</div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col">
														<label class="font-weight-bold text-dark text-2">District</label>
														 <select class="form-control" name="district_id">
                                                           <option>Please Select Your District</option>
                                                           @foreach( $districts as $district)
                                                             <option value="{{ $district->id }}">{{ $district->district_name}}</option>
                                                           @endforeach
                                                        </select>
													</div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Postal Code</label>
                                                        <input type="text" value="@if( Auth::check()) {{ Auth::user()->zip_code }} @endif" name="post_code" class="form-control" required="required">
													</div>
                                                </div>


												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Country</label>
														<input type="text" value="@if( Auth::check()) {{ Auth::user()->country }} @endif" name="country" class="form-control">
													</div>
												</div>

                                                <div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Message [If any]</label>
														  <textarea class="form-control" name="message" rows="3" placeholder="Write Your Message to us ......"></textarea>
													</div>
												</div>

                                                @if(Auth::check())
												 <input type="hidden" name="user_id" value="{{Auth::user()->id}}" >
                                                 @endif

												<div class="form-row">
													<div class="form-group col">
                                                        <input type="hidden" name="amount" value="{{ App\Models\Cart::totalPrice() }}">
                                                        <input type="submit" value="Place Order" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												Review &amp; Payment
											</a>
										</h4>
									</div>
									<div id="collapseThree" class="collapse">
										<div class="card-body">

                                            @if($cartItems->count() <=0)
                                            <div class="alert alert-info">
                                              Sorry!!! No Item added Into Your Cart. Please Add Your Product First.
                                            </div>
                                            @else

                                            <table class="shop_table cart">
												<thead>
													<tr>
														<th class="product-thumbnail">
															&nbsp;
														</th>
														<th class="product-name">
															Product
														</th>
														<th class="product-price">
															Price
														</th>
														<th class="product-quantity">
															Quantity
														</th>
														<th class="product-subtotal">
															Total
														</th>
													</tr>
												</thead>
												<tbody>
                                                    @php $total_price = 0; @endphp
                                                    @foreach( $cartItems as $item)
													<tr class="cart_table_item">
														<td class="product-thumbnail">
															<a href="">
                                                                @if($item->product->images->count() > 0)
														          <img width="100" height="100" class="img-fluid" src="{{ asset('backend/img/products/' . $item->product->images->first()->image)}}"  alt="{{ $item->product->title }}">
                                                                  @endif
															</a>
														</td>
														<td class="product-name">
                                                            <a href="{{route('productDetails', $item->product->slug)}}">{{ $item->product->title }}</a>
														</td>
														<td class="product-price">
															<span class="amount">
                                                                @if(!is_null($item->product->offer_price))
                                                                {{ $item->product->offer_price }}
                                                                @else
                                                                  {{ $item->product->regular_price }}
                                                               @endif</span>
														</td>
														<td class="product-quantity">
                                                            <div class="quantity">
																<input type="button" class="minus" value="-">
																<input type="text" class="input-text qty text" title="Qty" value="{{ $item->quantity }}" name="quantity" min="1" step="1">
																<input type="button" class="plus" value="+">
                                                        </div>
                                                    </td>
														<td class="product-subtotal">
															<span class="amount">
                                                                @if(!is_null($item->product->offer_price))
                                                                ৳{{ $total_price = $item->quantity  *  $item->product->offer_price }} BDT
                                                                @else
                                                                ৳{{ $total_price = $item->quantity  *  $item->product->regular_price }} BDT
                                                                @endif
                                                            </span>
														</td>
													</tr>
                                                    @endforeach

												</tbody>
											</table>
                                          @endif



											<hr class="solid my-5">

											<h4 class="text-primary">Cart Totals</h4>
											<table class="cart-totals">
												<tbody>
													<tr class="cart-subtotal">
														<th>
															<strong class="text-dark">Cart Subtotal</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">{{ App\Models\Cart::totalPrice() }}</span></strong>
														</td>
													</tr>
													<tr class="shipping">
														<th>
															Shipping
														</th>
														<td>
															Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
														</td>
													</tr>
													<tr class="total">
														<th>
															<strong class="text-dark">Order Total</strong>
														</th>
														<td>
															<strong class="text-dark"><span class="amount">{{ App\Models\Cart::totalPrice() }}</span></strong>
														</td>
													</tr>
												</tbody>
											</table>

											<hr class="solid my-5">

											<h4 class="text-primary">Payment</h4>

											<form action="/" id="frmPayment" method="post">
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentdirectbank">
															<label class="custom-control-label" for="paymentdirectbank">Direct Bank Transfer</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentcheque">
															<label class="custom-control-label" for="paymentcheque">Cheque Payment</label>
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" id="paymentpaypal">
															<label class="custom-control-label" for="paymentpaypal">Paypal</label>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="actions-continue">
                                <input type="hidden" name="amount" value="{{ App\Models\Cart::totalPrice() }}">
								<input type="submit" value="Place Order" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
							</div>

						</div>
						<div class="col-lg-3">
							<h4 class="text-primary">Cart Totals</h4>
							<table class="cart-totals">
								<tbody>
									<tr class="cart-subtotal">
										<th>
											<strong class="text-dark">Cart Subtotal</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount"></span></strong>
										</td>
									</tr>
									<tr class="shipping">
										<th>
											Shipping
										</th>
										<td>
											Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
										</td>
									</tr>
									<tr class="total">
										<th>
											<strong class="text-dark">Order Total</strong>
										</th>
										<td>
											<strong class="text-dark"><span class="amount"></span></strong>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>

			</div>
@endsection



