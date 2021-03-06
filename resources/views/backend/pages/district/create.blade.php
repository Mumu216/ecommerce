@extends('backend.layout.template')

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Create New District</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Create New District</h6>
        <form action="{{ route('district.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-6">

                        <div class="form-group">
                            <label>District Name</label>
                              <input type="text" name="district_name" class="form-control" required="required" autocomplete="off" placeholder="Enter District Name">
                        </div>

                          <div class="form-group">
                              <label>Division Name</label>
                                 <select class="form-control" name="division_id">
                                    <option>Please select The Division Name</option>
                                    @foreach($divisions as $division)
                                     <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                                </select>
                            </div>


                        <div class="form-group">
                            <label>District Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Please Select the status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                             </select>
                        </div>



                        <div class="form-group">
                            <input type="submit" name="addDistrict" value="Add New District" class="btn btn-teal btn-block mg-b-10">
                        </div>

                     </div>
                 </div>
            </form>

        </div>
    </div>
@endsection
