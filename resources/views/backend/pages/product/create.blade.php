@extends('backend.layout.template')

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Add New Product</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Add New Product</h6>
        <form action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                        <div class="form-group">
                            <label>Product Title</label>
                              <input type="text" name="title" class="form-control" required="required" autocomplete="off" placeholder="Enter Product Title">
                        </div>

                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control" name="brand_id">
                                <option>Please Select The Brand Name</option>
                             @foreach(  $brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                             @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option>Please Select The Category Name</option>
                             @foreach(  $categories as $pcat)
                                <option value="{{ $pcat->id }}">{{ $pcat->title }}</option>
                                @foreach( App\Models\Category::orderBy('title','asc')->where('is_parent', $pcat->id)->get() as $ccat)
                                  <option value="{{ $ccat->id }}">--{{ $ccat->title }}</option>
                             @endforeach
                             @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Product Quantity [Ex:5] </label>
                              <input type="text" name="quantity" class="form-control" required="required" autocomplete="off" placeholder="Enter Product Quantity">
                        </div>

                        <div class="form-group">
                            <label>Product Regular Price</label>
                              <input type="text" name="regular_price" class="form-control" required="required" autocomplete="off" placeholder="Enter Product Regular Price">
                        </div>

                        <div class="form-group">
                            <label>Product Offer Price</label>
                              <input type="text" name="offer_price" class="form-control"  autocomplete="off" placeholder="Enter Product Offer Price">
                        </div>

                        <div class="form-group">
                            <label>Featured Product</label>
                              <select class="form-control" name="is_featured">
                                <option value="0">Please Select The Featured Status</option>
                                <option value="1">Featured</option>
                                <option value="0">Reguler Product</option>
                               </select>
                           </div>
                     </div>

                     <div class="col-lg-6">
                         <div class="form-group">
                                <label>Status</label>
                                  <select class="form-control" name="status">
                                    <option value="1">Please Select The Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="4" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Tags [Seperated with Comma (,)]</label>
                                <input type="text" name="tags" class="form-control">
                            </div>

                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Main Thimbnail Image (*)</label>
                                          <input type="file" name="p_image[]" class="form-control-file">
                                    </div>
                                 </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Extra Image 1</label>
                                              <input type="file" name="p_image[]" class="form-control-file">
                                        </div>
                                     </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                      <label>Extra Image 2</label>
                                       <input type="file" name="p_image[]" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="submit" name="addProduct" value="Add New Product" class="btn btn-teal btn-block mg-b-10">
                            </div>
                        </div>
                    </div>
                 </div>
            </form>

        </div>
    </div>
@endsection
