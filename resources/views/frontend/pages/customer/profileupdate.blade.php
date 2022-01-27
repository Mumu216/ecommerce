@extends('frontend.layout.template')

@section('body-content')



			<div role="main" class="main shop py-4">

				<div class="container">

					<div class="row">
						<div class="col">

							<div class="featured-boxes">
								<div class="row">
									<div class="col">
										<div class="featured-box featured-box-primary text-left mt-2">
											<div class="box-content">
                                                <form action="{{ route('profile.store', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- Profile page content area start-->
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                @if ( !empty(Auth::user()->image) )
                                                                    <img src="" alt="User Image">
                                                                @else
                                                                    <img src="{{ asset('backend/img/users/images2.jpg') }}" alt="User Image" class="img-fluid">
                                                                @endif
                                                            </div>

                                                            <div class="col-lg-9">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Full Name</label>
                                                                            <input type="text" name="name" class="form-control" required="required" value="{{ Auth::user()->name }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Phone</label>
                                                                            <input type="text" name="phone" class="form-control" value="
                                                                            @if (!empty(Auth::user()->phone)) {{Auth::user()->phone  }} @else {{ old('phone') }} @endif ">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>City</label>
                                                                            <input type="text" name="city" class="form-control" value="
                                                                            @if (!empty(Auth::user()->city)) Auth::user()->city @else {{ old('city') }} @endif ">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Zip Code</label>
                                                                            <input type="text" name="zipcode" class="form-control" value="
                                                                            @if (!empty(Auth::user()->zipcode)) Auth::user()->zipcode @else {{ old('zipcode') }} @endif ">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Email Address</label>
                                                                            <input type="email" name="email" class="form-control" required="required" value="{{ Auth::user()->email }}">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <input type="text" name="address" class="form-control" value="
                                                                            @if (!empty(Auth::user()->address)) Auth::user()->address @else {{ old('address') }} @endif " >
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Country</label>
                                                                            <input type="text" name="country" class="form-control" value="
                                                                            @if (!empty(Auth::user()->country)) Auth::user()->country @else {{ old('country') }} @endif "  >
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Profile Picture</label>
                                                                            <input type="file" name="image" class="form-control-file" >
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="row">
                                                                     <div class="col-lg-12">
                                                                         <div class="form-group">
                                                                             <input type="submit" name="update" value="Save changes" class="btn btn-info">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                             <!-- Profile page content area End-->
                                            </form>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>

@endsection
