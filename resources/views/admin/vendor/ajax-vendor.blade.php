{{--<div class="form-group">--}}
{{--    <label for="recipient-name" class="col-form-label">Select Vendor : <span class="red">*</span><span class="red">*</span></label>--}}
{{--    <select name="vendor_id" id="recipient-name" class="form-control" required="">--}}
{{--        <option selected disabled>--- Select Vendor ---</option>--}}
{{--        @foreach($vendors as $vendor)--}}
{{--            <option {{ (old("vendor_id") == $vendor->id ? "selected":"") }} value="{{$vendor->id}}" >{{$vendor->name}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}

{{--    @foreach($vendors as $vendor)--}}
{{--        {{ $vendor->name }}--}}
{{--    @endforeach--}}
{{--</div>--}}
{{--<br>--}}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card comp-card">
                <div class="card-body">
                    <h5 class="w-100 text-center">All Vendors</h5>
                    <div class="table-responsive">
                        <table class="table table-hover" id="FranchiseTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vendors as $index => $vendor)
                                <tr>
                                    <th scope="row">{{$index+1}}</th>
                                    <td>
                                        <a href="{{ route('vendor.show', $vendor->id) }}" title="See Vendor Details">
                                            {{ $vendor->name }}
                                        </a>
                                    </td>
                                    <td class="all">
                                        {{ $vendor->address }}
                                    </td>
                                    <td>
                                        {{ mobileNumber($vendor->mobile) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('vendor.edit', ['id' => $vendor->id]) }}"
                                           class="btn btn-sm btn-outline-success">Edit</a>
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
<script>
    $(document).ready(function () {
        $('#FranchiseTable').DataTable();
    });
</script>



