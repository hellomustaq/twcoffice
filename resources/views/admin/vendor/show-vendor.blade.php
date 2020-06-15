@extends('layouts.master')

@section('title', 'See Vendor')

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
                        <div class="form-group">
                            <label for="vendorsForProject" class="col-form-label">Select Project : </label>
                            <select name="project_id" id="vendorsForProject" class="form-control">
                                <option selected disabled>--- Select Project ---</option>
                                @foreach($projects as $project)
                                    <option {{ (old("project_id") == $project->project_id ? "selected":"") }} value="{{$project->project_id}}">{{$project->project_name}}</option>
                                @endforeach

                            </select>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div id="vendorSelection"></div>
        </div>
    </div>

@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#vendorsForProject').change(function() {
                let project_id = this.value;

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url  : "{{route('vendors.inventory-vendor')}}",
                    type : "POST",
                    data : { project_id: project_id },
                    success : function(response){
                        $('#vendorSelection').html(response);
                    },
                    error : function(xhr, status){
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
@endsection

