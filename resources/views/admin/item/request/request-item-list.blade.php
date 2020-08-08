@extends('layouts.master')

@section('title', 'Item List')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('approve-item')}}" method="post" enctype="multipart/form-data" id="frm" >
                    @csrf
                    <div class="card comp-card">
                        <div class="card-body">
                            <h3 class="w-100 text-center">Item List</h3>
                            <div class="alert alert-warning alert-dismissible fade show" >
                                <h4 style="font-weight: bold" class="text-center">
                                    <i class="fa fa-bell" style="font-size:24px;color:red"></i> Rules!
                                </h4>
                                <p class="mb-0" style="font-weight: bold;color: red">
                                    1. If you want edit item please edit before changing item status.
                                    (যদি আপনি কোনো আইটেমের বিস্তারিত পরিবর্তন করতে চান,  তাহলে ওই আইটেমের  অবস্থা পরিবর্তন এর পূর্বে,  আইটেমের বিস্তারিত পরিবর্তন করুন।)
                                </p>
                                <p class="mb-0" style="font-weight: bold;color: red">
                                    2. If you want delete item please delete before changing item status.
                                    (যদি আপনি কোনো আইটেমের  মুছে ফেলতে চান,  তাহলে ওই আইটেমের  অবস্থা পরিবর্তন এর পূর্বে,  আইটেমের  মুছে ফেলুন। )
                                </p>
                                <p class="mb-0" style="font-weight: bold;color: red">
                                    3. After change all item status then press approve button.
                                    (সমস্ত আইটেমের স্থিতি পরিবর্তন করার পরে অনুমোদন বোতাম টিপুন।)
                                </p>
                                <p class="mb-0" style="font-weight: bold;color: red">
                                    4. Don't reload screen if you change item status, Reload screen after chnage status and press approve button.
                                    (আপনি যদি আইটেমের স্থিতি পরিবর্তন করেন, তবে স্ক্রীনটি পুনরায় লোড করবেন না।, যদি না আপনি অনুমোদন বোতাম প্রেস করেন )
                                </p>
                                <br>
                                <h4 class="alert-heading text-center" style="font-weight: bold">
                                    <i class="fa fa-warning" style="font-size:24px;color:red"></i> Warning!
                                </h4>
                                <p class="text-center" style="font-weight: bold; color: red">Please follow the rules strictly otherwise you will be block</p>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>

{{--                            <div class="alert alert-danger text-center" style="font-weight: bold" role="alert">--}}
{{--                                Please change item status otherwise your item package will not be accepted--}}
{{--                            </div>--}}
                            <div class="table-responsive">
                                <table class="table table-hover" id="itemList">
                                    <thead>
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Vat</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Subtitle Name</th>
                                        <th scope="col">Subtitle Actual Price</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($itemList as $index => $item)
                                        <tr>
                                            <th>
                                                <input style="width: 200px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][item_id]"
                                                       id="item_id" value="{{ $item->item_id}}" readonly/><br><br>
                                                <span class="label label-success">{{ $item->mother_category_id }}</span><br><br>
                                                <span class="label label-success">{{ $item->category_id }}</span><br><br>
                                                <span class="label label-success">{{ $item->sub_category_id }}</span><br><br>
                                                <span class="label label-success">{{ $item->item_type }}</span><br><br>
                                                <span class="label label-success">{{ $item->item_description }}</span>
                                            </th>
                                            <th>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][price]"
                                                       id="price" value="{{ $item->price }}" readonly/>
                                            </th>
                                            <th>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][vat]"
                                                       id="vat" value="{{ $item->vat }}" readonly/>
                                            </th>
                                            <th>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][quantity]"
                                                       id="quantity" value="{{ $item->quantity }}" readonly/>
                                            </th>
                                            <th>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][amount]"
                                                       id="amount" value="{{ $item->amount }}"
                                                       readonly/>
                                            </th>
                                            <th>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="hidden" name="addmore[{{ $index }}][item_subtitle]"
                                                       id="" value="{{ $item->subtitle->id ?? "None" }}"
                                                       readonly/>
                                                {{ $item->subtitle->name ?? 'NONE'}}
                                            </th>
                                            <th>{{ $item->subtitle->price ?? 'NONE' }}</th>
                                            <th hidden>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][request_code]"
                                                       id="request_code" value="{{ $item->request_code }}"
                                                       readonly/>
                                            </th>
                                            <th hidden>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][user_id]"
                                                       id="request_code" value="{{ $item->request_id }}"
                                                       readonly/>
                                            </th>
                                            <th hidden>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][cartId]"
                                                       id="cartId" value="{{ $item->cartId }}"
                                                       readonly/>
                                            </th>
                                            <th hidden>
                                                <input style="width: 100px; background-color: white; border: none"
                                                       type="text" name="addmore[{{ $index }}][project_id]"
                                                       id="project_id" value="{{ $item->project_id }}"
                                                       readonly/>
                                            </th>
                                            <td>
                                                <a href="{{ route('edit-request-inventory', ['id' => $item->id]) }}"
                                                   class="btn btn-sm btn-outline-primary">Edit</a>
                                                <a id="deleteBtn" data-id="{{$item->id}}" href="#"
                                                   class="btn btn-sm btn-danger">Delete</a>
{{--                                                <a href="{{ route('delete-request-inventory', ['id' => $item->id]) }}"--}}
{{--                                                   class="btn btn-sm btn-danger">Delete</a>--}}
                                            </td>
                                            <td>
                                                <input type="checkbox" data-id="{{ $item->id }}" name="status_req" class="js-switch" {{ $item->status_req == 1 ? 'checked' : '' }}>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th>Total</th>
                                        <th>{{ number_format($itemList->sum('price'),2) }}</th>
                                        <th></th>
                                        <th>{{ number_format($itemList->sum('quantity'),2) }}</th>
                                        <th>{{ number_format($itemList->sum('amount'),2) }}</th>
                                        <th></th>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-row mb-3">
                                    <div class="col text-center" id="counter">
                                        @if( $item->status_req === 0 )
                                            <input type="submit" value="Approved Item" class="btn btn-outline-success text-uppercase">
                                        @else
                                            <div class="alert alert-danger text-center" style="font-weight: bold" role="alert">
                                                You have approved this package
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script>
        // $('#itemList').DataTable({});

        $(document).on('click', '#deleteBtn', function (el) {
            var mcId = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this item request!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("You have deleted a item", {
                            icon: "success",
                        });
                        window.location.href = "request/delete/" + mcId;
                    }


                });
        });

        $(document).on('click', '#deleteNo', function (el) {
            swal("Oops", "You can't delete this. Some item belongs to it!!", "error")
        })

    </script>

    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

        $(document).ready(function(){

            $('#itemList').on('change', '.js-switch', function(){
                // ... skipped ...
                let status_req = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('change-approve-status') }}',
                    data: {'status_req': status_req, 'user_id': userId},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });
        });

    </script>



@endsection
