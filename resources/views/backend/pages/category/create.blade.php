@extends('backend.layout.template')

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create New Category</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Create New Category</h6>
        <form action="{{ route('category.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                        <div class="form-group">
                            <label>Category Title</label>
                            <input type="text" name="title" class="form-control" required="required" autocomplete="off" placeholder="Enter Category Title">
                        </div>


                        <div class="form-group">
                            <label>Primary Category [ Optional ]</label>
                            <select class="form-control" name="is_parent">
                                <option value="0">Please Select the Primary Category</option>
                                @foreach($parents as $p)
                                <option value="{{ $p->id }}">{{ $p->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                               <select class="form-control" name="status">
                                <option value="1">Please Select the status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                             </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Category Description</label>
                            <textarea class="form-control" name="description"  rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Category Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" name="addCategory" value="Add New Category" class="btn btn-teal btn-block mg-b-10">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
