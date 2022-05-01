@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Your Project Requirement</h2>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link active w-100" id="step1-tab" data-bs-toggle="tab" data-bs-target="#step1" type="button" role="tab" aria-controls="step1" aria-selected="true">1</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link w-100" id="step2-tab" data-bs-toggle="tab" data-bs-target="#step2" type="button" role="tab" aria-controls="step2" aria-selected="false">2</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-3 border" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                                <div class="mb-3">
                                    <label>Choose your product</label>
                                    <select name="product" class="form-control" required>
                                        <option value="product1">Product 1</option>
                                        <option value="product2">Product 2</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Solution Description</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Target Audience</label>
                                    <select class="form-control" multiple="multiple" name="target[]" id="target" required>
                                        <option>E-commerce</option>
                                        <option>Virtual Assistant</option>
                                        <option>Social Media</option>
                                    </select>
                                </div>
                                <a href="{{ route('home') }}" class="btn btn-outline-primary">Cancel</a>
                                <div class="float-right">
                                    <button type="button" class="btn btn-primary" id="next-tab">Next</button>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 border" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                                <div class="row mb-3">
                                    <div class="col-8 mb-3">
                                        <label>Do you have a coding language preference? </label>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input has_coding_language" type="radio" name="has_coding_language" id="has_coding_language_1" value="1" >
                                            <label class="form-check-label" for="has_coding_language_1">
                                            Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input has_coding_language" type="radio" name="has_coding_language" id="has_coding_language_0" value="0">
                                            <label class="form-check-label" for="has_coding_language_0">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="coding_language" class="ml-2 coding_language" style="display: none;">If yes, what would it be:</label>
                                        <input type="text" name="coding_language" id="coding_language" class="form-control coding_language" style="display: none;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-8 mb-3">
                                        <label>Do you have a map of your software build-up? </label>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input has_buildup" type="radio" name="has_buildup" id="has_buildup_1" value="1" >
                                            <label class="form-check-label" for="has_buildup_1">
                                            Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input has_buildup" type="radio" name="has_buildup" id="has_buildup_0" value="0">
                                            <label class="form-check-label" for="has_buildup_0">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <label for="buildup" class="ml-2 buildup_1" style="display: none;">If yes (please upload it):</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="file" name="buildup_file" id="buildup" class="form-control buildup_1"  style="display: none;">
                                    </div>
                                    <div class="col-8 mb-3">
                                        <label class="ml-2 buildup_0" style="display: none;">If no, would you like to have it created by Code Expert:</label>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="form-check form-check-inline buildup_0" style="display: none;">
                                            <input class="form-check-input is_buildup_by_code_expert" type="radio" name="is_buildup_by_code_expert" id="is_buildup_by_code_expert_1" value="1" >
                                            <label class="form-check-label" for="is_buildup_by_code_expert_1">
                                            Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline buildup_0" style="display: none;">
                                            <input class="form-check-input is_buildup_by_code_expert" type="radio" name="is_buildup_by_code_expert" id="is_buildup_by_code_expert_0" value="0">
                                            <label class="form-check-label" for="is_buildup_by_code_expert_0">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <label for="buildup" class="ml-4 buildup_date" style="display: none;">If no: please select the date for sharing your final map:</label>
                                    </div>
                                    <div class="col-2 offset-1">
                                        <input type="date" name="buildup_date" id="buildup_date" class="form-control buildup_date" style="display: none;">
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-8 mb-3">
                                        <label>Do you have your software design element? </label>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input has_design" type="radio" name="has_design" id="has_design_1" value="1" >
                                            <label class="form-check-label" for="has_design_1">
                                            Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input has_design" type="radio" name="has_design" id="has_design_0" value="0">
                                            <label class="form-check-label" for="has_design_0">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-8 mb-3">
                                        <label for="design" class="ml-2 design_1" style="display: none;">If yes (please upload it):</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="file" name="design_file" id="design" class="form-control design_1" style="display: none;">
                                    </div>
                                    <div class="col-8 mb-3">
                                        <label class="ml-2 design_0" style="display: none;">If no, would you like to have it created by Code Expert:</label>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="form-check form-check-inline design_0" style="display: none;">
                                            <input class="form-check-input is_design_by_code_expert" type="radio" name="is_design_by_code_expert" id="is_design_by_code_expert_1" value="1" >
                                            <label class="form-check-label" for="is_design_by_code_expert_1">
                                            Yes
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline design_0" style="display: none;">
                                            <input class="form-check-input is_design_by_code_expert" type="radio" name="is_design_by_code_expert" id="is_design_by_code_expert_0" value="0">
                                            <label class="form-check-label" for="is_design_by_code_expert_0">
                                            No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-8 mb-3">
                                        <label for="design" class="ml-4 design_date" style="display: none;">If no: please select the date for sharing your final map:</label>
                                    </div>
                                    <div class="col-2 offset-1">
                                        <input type="date" name="design_date" id="design_date" class="form-control design_date" style="display: none;">
                                    </div>

                                </div>

                                        <button type="button" class="btn btn-outline-primary" id="prev-tab">Previous</button>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </div>
                        </div>

                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#target').select2({
            tags: true,
        });
    });

    $(document).on('click', '#next-tab', function () {
        var target = $('#step2-tab').data('bs-target');

        var current = $('.nav .active');
        var currentTarget = current.data('bs-target');

        $(currentTarget).hide();

        current.removeClass('active');
        current.removeClass('show');


        $('#step2-tab').addClass('active');

        console.log(target);
        $(target).show();
        $(target).addClass('active');
        $(target).addClass('show');
    });

    $(document).on('click', '#prev-tab', function () {
        var target = $('#step2-tab').data('bs-target');

        var current = $('.nav .active');
        var currentTarget = current.data('bs-target');

        $(currentTarget).hide();

        current.removeClass('active');
        current.removeClass('show');


        $('#step2-tab').addClass('active');

        console.log(target);
        $(target).show();
        $(target).addClass('active');
        $(target).addClass('show');
    });


    $(document).on('change', '.has_coding_language', function(){
        display($(this).val(), 'coding_language');
    });

    $(document).on('change', '.has_buildup', function(){
        if ($(this).val() === '1') {
            display('1', 'buildup_1');
            display('0', 'buildup_0');
        }
        else {
            display('1', 'buildup_0');
            display('0', 'buildup_1');
        }
    });

    $(document).on('change', '.is_buildup_by_code_expert', function(){
        if ($(this).val() === '1') {
            display('0', 'buildup_date');
        }
        else {
            display('1', 'buildup_date');
        }
    });

    $(document).on('change', '.has_design', function(){
        if ($(this).val() === '1') {
            display('1', 'design_1');
            display('0', 'design_0');
        }
        else {
            display('1', 'design_0');
            display('0', 'design_1');
        }
    });

    $(document).on('change', '.is_design_by_code_expert', function(){
        if ($(this).val() === '1') {
            display('0', 'design_date');
        }
        else {
            display('1', 'design_date');
        }
    });






    function display(value, hide) {
        if (value === '1') {
            $('.' + hide).show();
            $('#' + hide).attr('required', true);
        }
        else {
            $('.' + hide).hide();
            $('#' + hide).attr('required', false);
        }
    }

</script>
@endpush
