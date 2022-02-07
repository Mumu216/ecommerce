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
											<div class="box-content  order-history">

                                             <!-- order history  page content area start-->

                                                <div class="row">
                                                    <!-- order page left menu bar-->
                                                    <div class="col-lg-2">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Order History</a>

                                                         </div>
                                                        </div>
                                                       <!-- Table content tab wise-->
                                                    <div class="col-10">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <!-- table start-->
                                                            <table class="table">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                      <th scope="col">SL.</th>
                                                                      <th scope="col">Order ID</th>
                                                                      <th scope="col">Order Date</th>
                                                                      <th scope="col">Items</th>
                                                                      <th scope="col">Total Amount</th>
                                                                      <th scope="col">Status</th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    <tr>
                                                                      <th scope="row">1</th>
                                                                      <td># id 56766</td>
                                                                      <td>15th January, 2022</td>
                                                                      <td>
                                                                        <span class="badge badge-info" data-toggle="modal" data-target="#productdetails"> Products</span>
                                                                      </td>
                                                                      <td>$700</td>
                                                                      <td>
                                                                          <span class="badge badge-success">Completed</span>
                                                                         <!-- <span class="badge badge-primary">In Progress</span>
                                                                          <span class="badge badge-danger">Canceled</span>
                                                                          <span class="badge badge-warning">Hold</span>
                                                                          <span class="badge badge-success">Returned</span> -->
                                                                          </td>

<!-- product details start -->
<div class="modal fade" id="productdetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Your Items</h5>

        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>


                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- table start-->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <!-- order history page content area start-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
