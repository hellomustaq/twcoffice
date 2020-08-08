@extends('layouts.master')

@section('title','Request Item')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>

    <style>
        .cart-color {
            background-color: #aed581;
        }
    </style>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="{{route('request-inventory')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card" id="testform">
                        <div class="card-header">
                            <h3 style="text-align: center;">Request Item</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row mb-3">
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Mother Category <small style="color: red">*</small></small>
                                    <select  required=" " oninvalid="this.setCustomValidity('Please select a mother category')" id="motherCategory" name="mother_category_id" class="form-control" required
                                            onblur="setRequestCode()">
                                        <option disabled selected>Select a mother category....</option>
                                        @foreach($motherCategory as $motherCategories)
                                            <option
                                                value="{{$motherCategories->id}} - {{$motherCategories->mother_name}}"
                                                id="mother">{{$motherCategories->mother_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Category</small>
                                    <select id="category" name="category_id" class="form-control"
                                            onblur="setRequestCode()">
                                        <option disabled selected>Select Category....</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Sub Category</small>
                                    <select id="subCategory" name="sub_category_id" class="form-control"
                                            onblur="setRequestCode()">
                                        <option disabled selected>Select a sub category</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Manufacture</small>
                                    <select id="manufacture_id" name="manufacture_id" class="form-control"
                                            onblur="setRequestCode()">
                                        <option disabled selected>Select a manufacturer....</option>
                                        @foreach($manufacture as $manufactures)
                                            <option value="{{$manufactures->id}}">{{$manufactures->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php
                                $user = \Illuminate\Support\Facades\Auth::user()->id;
                            @endphp
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input hidden type="text" name="request_id" placeholder="Request ID"
                                           class="form-control"
                                           id="requestName" value="{{ $user }}" readonly/>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <small class="text-uppercase text-dark">Select Project<small style="color: red">*</small></small>
                                    <select required=" " oninvalid="this.setCustomValidity('Please select a project')" id="project_name" name="project_id" class="form-control"
                                            onblur="setRequestCode()">
                                        <option disabled selected>Select a project...</option>
                                        @foreach($project as $projects)
                                            <option
                                                value="{{$projects->project_id}}"
                                                id="mother">{{$projects->project_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Item Name<small style="color: red">*</small></small>
                                    <select id="items" name="item_id" class="form-control" required=" " oninvalid="this.setCustomValidity('Please select an item')"  onblur="setRequestCode()">
                                        <option disabled selected>Select Item....</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Item Subtitle<small style="color: red">*</small></small>
                                    <select id="item_subtitle" name="item_subtitle" class="form-control" required=" " oninvalid="this.setCustomValidity('Please select an item subtitle')"  onblur="setRequestCode()">
                                        <option disabled selected>Select Item subtitle....</option>
                                    </select>
                                </div>
{{--                                <div class="col-sm-12">--}}
{{--                                    <small class="text-uppercase text-dark">Item Type<small style="color: red">*</small></small>--}}
{{--                                    <input type="text" class="form-control" id="recipient-name" name="item_type" placeholder="Item Type"--}}
{{--                                           value="{{ old('item_type') }}" required="">--}}
{{--                                </div>--}}
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Item Description</small>
                                    <textarea type="text" class="form-control" id="recipient-name" name="item_description" placeholder="Item Description"
                                              value="{{ old('item_description') }}" required="" rows="5">
                                    </textarea>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Price<small style="color: red">*</small></small>
                                    <input id="price" type="text" name="price" placeholder="Price"
                                           class="form-control" required=" " oninvalid="this.setCustomValidity('Please input price')" onblur="totalAmount()"/>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Quantity<small style="color: red">*</small></small>
                                    <input id="quantity" type="text" name="quantity"
                                           placeholder="Quantity" class="form-control" required=" "  oninvalid="this.setCustomValidity('Please input quantity')" onblur="totalAmount()"/>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Amount<small style="color: red">*</small></small>
                                    <input id="amount" type="text" name="amount" placeholder="Amount"
                                           class="form-control" required=" " readonly  onblur="totalAmount()"/>
                                </div>
                                <div class="col-sm-12">
                                    <small class="text-uppercase text-dark">Vat <span style="color: red">%</span></small>
                                    <input type="text" name="vat" placeholder="Vat"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col">
                                    <small class="text-uppercase text-dark">Auto Generated Request ID<small style="color: red">*</small></small>
                                    <input type="text" name="request_code" placeholder="Request Code"
                                           class="form-control"
                                           id="requestCode" readonly/>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col text-center">
                                    <input type="submit" value="Add" id=""
                                           class="btn btn-outline-success text-uppercase">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    function setRequestCode() {

                        var getMotherCategory = document.getElementById('motherCategory').value;

                        var getCategory = document.getElementById('category').value;
                        var getSubCategory = document.getElementById('subCategory').value;
                        var getManufacture = document.getElementById('manufacture_id').value;
                        var getProject = document.getElementById('project_name').value;
                        var getItem = document.getElementById('items').value;

                        var slicedRequestCategoryName = getCategory.slice(0, 2);
                        var finalRequestCategoryName = slicedRequestCategoryName.toUpperCase();

                        var slicedRequestSubCategoryName = getSubCategory.slice(0, 2);
                        var finalRequestSubCategoryName = slicedRequestSubCategoryName.toUpperCase();

                        var slicedRequestManufactureName = getManufacture.slice(0, 2);
                        var finalRequestManufactureName = slicedRequestManufactureName.toUpperCase();

                        var slicedRequestProject = getProject.slice(0, 2);
                        var finalRequestProject = slicedRequestProject.toUpperCase();

                        var slicedRequestItem = getItem.slice(0, 2);
                        var finalRequestItem = slicedRequestItem.toUpperCase();

                        document.getElementById('requestCode').value = "REG" + getMotherCategory  + finalRequestCategoryName + finalRequestSubCategoryName + finalRequestManufactureName + finalRequestProject + finalRequestItem;

                    }

                    function totalAmount() {

                        var getPrice = document.getElementById('price').value;
                        var getQuantity = document.getElementById('quantity').value;

                        var getTotalAmount = Number(getPrice * getQuantity);
                        var roundedString = getTotalAmount.toFixed(2);
                        var getFinalAmount = Number(roundedString);

                        // var num = Number(0.005);

                        document.getElementById('amount').value = getFinalAmount;
                    }
                </script>
            </div>
            <div class="col-sm-8">
                    <div class="card comp-card">
                        <form action="{{route('request-cart-inventory')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="card-body cart-color">
                            <h5 class="w-100 text-center">All Requested Item List <br><small style="color: red">Do not put same name twice</small></h5>
                            <div class="table-responsive">
                                <table class="table table-bordered " id="itemList">
                                    <thead>
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Mother Category</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Sub Category</th>
                                        <th scope="col">Item Note</th>
                                        <th scope="col">Item Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Vat</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Item subtitle name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    @php
                                        $uniqid = \Str::random(12);
                                    @endphp
                                    <tbody>
{{--                                    {{ dd(Cart::content()) }}--}}
                                    @foreach(Cart::content() as $index => $item)
                                        <tr>
                                            <td>
                                                <input style="width: 200px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][item_id]"
                                                       id="item_id" value="{{ $item->options->item_id}}" readonly/>
                                            </td>
                                            <td hidden>
                                                <input style="width: 30px; background-color: #aed581; border: none"
                                                       type="number" name="addmore[{{ $index }}][status_req]"
                                                       id="status" value="0" readonly/>
                                            </td>
                                            <td hidden>
                                                <input style="width: 30px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][cartId]"
                                                       id="cartId" value="{{ $uniqid }}" readonly/>
                                            </td>
                                            <td >
                                                <input  style="width: 200px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][mother_category_id]"
                                                       id="item_id" value="{{ $item->options->mother_category_id }}" readonly/>
                                            </td>
                                            <td >
                                                <input  style="width: 200px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][category_id]"
                                                       id="item_id" value="{{ $item->options->category_id }}" readonly/>
                                            </td>
                                            <td >
                                                <input style="width: 200px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][sub_category_id]"
                                                       id="item_id" value="{{ $item->options->sub_category_id }}" readonly/>
                                            </td>
                                            <td hidden>
                                                <input hidden style="width: 30px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][manufacture_id]"
                                                       id="item_id" value="{{ $item->options->manufacture_id }}" readonly/>
                                            </td>
                                            <td hidden>
                                                <input hidden style="width: 30px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][project_id]"
                                                       id="item_id" value="{{ $item->options->project_id }}" readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 100px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][item_type]"
                                                       id="item_id" value="{{ $item->options->item_type }}" readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 300px; background-color: #aed581; border: none"
                                                           type="text" name="addmore[{{ $index }}][item_description]"
                                                       id="item_id" value="{{ $item->options->item_description }}" readonly/>
                                            </td>
                                            @php
                                                $dateTime = \Carbon\Carbon::now();
                                            @endphp
                                            <td hidden>
                                                <input hidden style="width: 30px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][request_date]"
                                                       id="item_id" value="{{ $dateTime }}" readonly/>
                                            </td>
                                            <td hidden>
                                                <input hidden style="width: 30px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][request_code]"
                                                       id="item_id" value="{{ $item->options->request_code }}" readonly/>
                                            </td>
                                            <td hidden>
                                                <input hidden style="width: 30px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][request_id]"
                                                       id="item_id" value="{{ $item->options->request_id }}" readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 100px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][price]"
                                                       id="price" value="{{ $item->options->price }}"
                                                       readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 100px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][vat]"
                                                       id="vat" value="{{ $item->options->vat }}"
                                                       readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 100px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][quantity]"
                                                       id="quantity"
                                                       value="{{ $item->options->quantity }}"
                                                       readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 100px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][amount]"
                                                       id="amount" value="{{ $item->options->amount }}"
                                                       readonly/>
                                            </td>
                                            <td>
                                                <input style="width: 200px; background-color: #aed581; border: none"
                                                       type="text" name="addmore[{{ $index }}][item_subtitle]"
                                                       id="item_subtitle" value="{{ $item->options->item_subtitle}}" readonly/>
                                            </td>
                                            <td>
                                                <button id="del" data-row="{{$item->rowId}}" type="button"
                                                        class="btn btn-danger p-1 delete-attendance-btn">
                                                    <i class="feather icon-trash-2"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
{{--                                        <th>{{ Cart::total() }}</th>--}}
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col text-center">
                                    <input type="submit" value="Request" id=""
                                           class="btn btn-outline-success text-uppercase">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection


@section('script')

    <script>
        $(document).on('click', '#del', function (el) {
            el.preventDefault();
            var rowId = $(this).data("row");
            console.log(rowId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {rowId: rowId},
                method: "POST",
                url: `inventory/cart/qty/delete`,
                success: function (data) {
                    if (data.success == true) { // if true (1)
                        setTimeout(function () {// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 0);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '#deleteBtn', function (el) {
            var mcId = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Item!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("You have deleted one product", {
                            icon: "success",
                        });
                        window.location.href = window.location.href = "item-list-del/delete/" + mcId;
                    }


                });
        });
    </script>


    <script>

        $('#motherCategory').on('change', e => {
            e.preventDefault();
            $('#category').empty();
            $('#category').append(`<option disabled selected>Please Select Category</option>`);

            var mcId = $('#motherCategory').find(":selected").val();
            console.log(mcId);
            $.ajax({
                url: `inventory/items/${mcId}`,
                success: data => {
                    data.categories.forEach(category =>
                        $('#category').append(`<option value="${category.id} - ${category.category_name}">${category.category_name}</option>`)
                    )
                }
            })
        });

        $('#category').on('change', e => {
            document.getElementById("subCategory").removeAttribute("disabled");
        });
    </script>

    <script>

        $('#category').on('change', e => {
            e.preventDefault();
            $('#subCategory').empty();
            $('#subCategory').append(`<option disabled selected>Please Select Sub Category</option>`);

            var mcId = $('#category').find(":selected").val();
            console.log(mcId);
            $.ajax({
                url: `inventory/items-sub/${mcId}`,
                success: data => {
                    data.subCategories.forEach(subCategory =>
                        $('#subCategory').append(`<option value="${subCategory.id} - ${subCategory.sub_category_name}">${subCategory.sub_category_name}</option>`)
                    )
                }
            })
        });
    </script>

    <script>

        $('#subCategory').on('change', e => {
            e.preventDefault();
            $('#items').empty();
            $('#items').append(`<option disabled selected>Please select a item name</option>`);

            var mcId = $('#subCategory').find(":selected").val();
            console.log(mcId);
            $.ajax({
                url: `inventory/item-sub-category/${mcId}`,
                success: data => {
                    data.item.forEach(items =>
                        $('#items').append(`<option value="${items.id} - ${items.item_name}">${items.item_name}</option>`)
                    )
                }
            })
        });
    </script>


    <script>

        $('#motherCategory').on('change', e => {
            e.preventDefault();
            $('#items').empty();
            $('#items').append(`<option disabled selected>Please select a item name</option>`);

            var mcId = $('#motherCategory').find(":selected").val();
            console.log(mcId);
            $.ajax({
                url: `inventory/item-mother-category/${mcId}`,
                success: data => {
                    data.item.forEach(items =>
                        $('#items').append(`<option value="${items.id} - ${items.item_name}">${items.item_name}</option>`)
                    )
                }
            })
        });


        $('#items').on('change', e => {
                e.preventDefault();
                $('#item_subtitle').empty();
                $('#item_subtitle').append(`<option disabled selected>Please select a item name</option>`);

                var itemId = $('#items').find(":selected").val();
                var iid = itemId.split(" -");
                console.log(iid[0]);
                $.ajax({
                    url: `inventory/subtitle/${iid[0]}`,
                    success: data => {
                        data.item_subtitle.forEach(subtitle =>
                            $('#item_subtitle').append(`<option value="${subtitle.id}">${subtitle.name}</option>`)
                        )
                    }
                })
        });

    </script>

    <script>

        $('#category').on('change', e => {
            e.preventDefault();
            $('#items').empty();
            $('#items').append(`<option disabled selected>Please select a item name</option>`);

            var mcId = $('#category').find(":selected").val();
            console.log(mcId);
            $.ajax({
                url: `inventory/item-category/${mcId}`,
                success: data => {
                    data.item.forEach(items =>
                        $('#items').append(`<option value="${items.id} - ${items.item_name}">${items.item_name}</option>`)
                    )
                }
            })
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
    </script>

    {{--        <script>--}}
    {{--            $('#itemList').DataTable({--}}

    {{--            });--}}
    {{--        </script>--}}


@endsection

