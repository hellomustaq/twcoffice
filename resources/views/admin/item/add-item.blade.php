@extends('layouts.master')

@section('title', 'Create New Item')

@section('style')
    <style>
        .form-group {
            margin-bottom: unset;
        }

        .form-group {
            margin-bottom: unset;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card comp-card">
                <div class="card-body">
                    <h3 style="text-align: center;">Create New Item</h3>
                    <form action="{{route('create-inventory')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row mb-3">
                            <div class="col">
                                <small class="text-uppercase text-dark">Select Mother Category<span
                                        class="required text-danger">*</span></small>
                                <select id="motherCategory" name="mother_category_id" class="form-control" required>
                                    <option>Select a mother category....</option>
                                    @foreach($motherCategory as $motherCategories)
                                        <option
                                            value="{{$motherCategories->id}}">{{$motherCategories->mother_name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('mother_name'))
                                    <small
                                        class="form-control-feedback text-danger">{{ $errors->first('mother_name') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <small class="text-uppercase text-dark">Select Category</small>
                                <select id="category" name="category_id" class="form-control">
                                    <option disabled selected>Select Category....</option>
                                </select>

                                @if ($errors->has('category_name'))
                                    <small
                                        class="form-control-feedback text-danger">{{ $errors->first('category_name') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <small class="text-uppercase text-dark">Select Sub Category</small>
                                <select id="subCategory" name="sub_category_id" class="form-control">
                                    <option disabled selected>Select a sub category</option>
                                </select>

                                @if ($errors->has('sub_category_name'))
                                    <small
                                        class="form-control-feedback text-danger">{{ $errors->first('sub_category_name') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <small class="text-uppercase text-dark">Select Manufacturer</small>
                                <select id="manufacture_id" name="manufacture_id" class="form-control" >
                                    <option disabled selected>Select a manufacturer....</option>
                                    @foreach($manufacture as $manufactures)
                                        <option value="{{$manufactures->id}}">{{$manufactures->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('name'))
                                    <small
                                        class="form-control-feedback text-danger">{{ $errors->first('name') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name: <span class="red">*</span></label>
                            <input type="text" class="form-control" id="recipient-name" name="item_name"
                                   value="{{ old('item_name') }}" required="">
                            <small class="red">Please Do not use (")</small>
                        </div>
                        <div class="field_wrapper form-group">
                            <div>
                                <label class="col-form-label">Item subtitles: </label><br>
                                <input type="text" name="subtitle_name[]" value="" placeholder="subtitle name.."/>
                                <input type="text" name="subtitle_price[]" value="" placeholder="subtitle price.."/>
                                <a href="javascript:void(0);" class="add_button" title="Add field"><i style="color: limegreen" class="fa fa-plus-circle"></i></a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Item Type: <span class="red">*</span></label>
                            <input type="text" class="form-control" id="recipient-name" name="item_type"
                                   value="{{ old('item_type') }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Item Description: <span class="red">*</span></label>
                            <textarea type="text" class="form-control" id="recipient-name" name="item_description"
                                   value="{{ old('item_description') }}" required="" rows="5">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Item Unit: <span
                                    class="red">*</span></label>
                            <input type="text" class="form-control" id="recipient-name" name="item_unit"
                                   value="{{ old('item_unit') }}" required="">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Per Unit Price <span class="red">*</span></label>
                            <input type="text" class="form-control" id="recipient-name" name="item_price"
                                   value="{{ old('item_price') }}">
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <small class="text-uppercase text-dark">Item Image</small>
                                <input type="file" name="item_image" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Reusable: <span
                                    class="red">*</span></label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="item_reusable" value="1"
                                       class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadioInline1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="item_reusable" value="0"
                                       class="custom-control-input" required>
                                <label class="custom-control-label" for="customRadioInline2">NO</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-mat btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection

@section('script')

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
                    $('#category').append(`<option value="${category.id}">${category.category_name}</option>`)
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
                    $('#subCategory').append(`<option value="${subCategory.id}">${subCategory.sub_category_name}</option>`)
                )
            }
        })
    });
</script>

<script>
    $("#subtitles").select2({
        tags: true,
        width: '100%',
        theme: "classic"
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        let maxField = 20; //Input fields increment limitation
        let addButton = $('.add_button'); //Add button selector
        let wrapper = $('.field_wrapper'); //Input field wrapper
        let fieldHTML = '<div><input style="margin-right: 5px;" type="text" name="subtitle_name[]" value="" placeholder="subtitle name"/>' +
            '<input style="margin-right:5px;" type="text" name="subtitle_price[]" value="" placeholder="subtitle price"/>' +
            '<a href="javascript:void(0);" class="remove_button"><i style="color: red;" class="fa fa-minus-circle"></i></div>'; //New input field html
        let x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>

@endsection
