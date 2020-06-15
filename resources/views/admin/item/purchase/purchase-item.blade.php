@extends('layouts.master')

@section('title', 'Purchase Item')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($itemList as $index => $item)
                    <div hidden>
                        {{ $a = $item->cartId }}
                    </div>
                @endforeach
                <form action="{{ route('change-status', $a)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card comp-card">
                        <div class="card-body">
                            <h5 class="w-100 text-center">Purchase Item</h5>
                            <div class="table-responsive">
                                <table class="table table-hover" id="itemList">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Vat</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payable Amount</th>
                                        <th scope="col">Select Vendor</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($itemList as $index => $item)
                                        <tr>
                                            <th scope="row">{{$index+1}}</th>
                                            <td>
                                                {{ $item->item_id }}
                                            </td>
                                            <td>
                                                {{ number_format($item->price,2) }}
                                            </td>
                                            <td>
                                                {{ number_format($item->vat,2) }}
                                            </td>
                                            <td>
                                                {{ $item->quantity }}
                                            </td>
                                            <td>
                                                {{ number_format($item->amount,2) }}
                                            </td>
                                            <td hidden>
                                                {{ $a = $item->cartId }}
                                            </td>
                                            <td>
                                                {{ $item->request_code }}
                                            </td>
                                            <th>
                                                <a href="{{ route('edit-inventory-vendor', ['id' => $item->id]) }}"
                                                   class="btn btn-sm btn-outline-primary">Vendor</a>
                                            </th>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
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
                                    <div class="col text-center">
                                        @if( $item->status === 0)
                                            <br>
                                            <br>
                                            @if($item->vendor_id != null)
                                                <button type="submit" class="btn btn-outline-success text-uppercase" name="status" value="1">Purchase</button>
                                            @else
                                                <div class="alert alert-danger text-center" style="font-weight: bold" role="alert">
                                                    Please select all item's vendor
                                                </div>
                                            @endif
                                        @else
                                            <div class="alert alert-danger text-center" style="font-weight: bold" role="alert">
                                                You have purchase this item package
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
        $('#itemList').DataTable({});

        $(document).on('click', '#deleteBtn', function (el) {
            var mcId = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Product!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("You have deleted a product", {
                            icon: "success",
                        });
                        window.location.href = window.location.href = "items-del/delete/" + mcId;
                    }


                });
        });

    </script>

    <script language="javascript">
        function confirmDel() {
            var agree = confirm("Please Select a Vendor");
            if (!agree) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>

@endsection
