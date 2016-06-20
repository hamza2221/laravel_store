@extends('Admin.main')
@section('title','New User | Admin')
@section('content')
@section('page_header','New Admin/User')
<div class="row">


    <div class="col-lg-4">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label">Name</label>

                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class=" control-label">E-Mail Address</label>

                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label">Password</label>

                <input type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>



            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class=" control-label">Confirm Password</label>

                <input type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif

            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class=" control-label">Role</label>

                <select id="role" class="form-control" name="role" >
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>

            </div>
            <div hidden="" id="userPrefrences">
                <div class="form-group">
                    <label >                     
                        <input type="checkbox" value="1" name="send_email"  >
                        Send Email</label>  
                </div>
                <div class="form-group">
                    <label >                     
                        <input type="checkbox" value="1" name="company_update"  >
                        Company Update</label>  
                </div>
                <div class="form-group">
                    <label >                     
                        <input type="checkbox" value="1" name="weekly_update" >
                        Weekly Update</label>  
                </div>
                <div class="form-group">
                    <label >                     
                        <input type="checkbox" value="1" name="calender_update">
                        Calender Update</label>  
                </div>
                <div class="form-group">
                    <label >                     
                        <input type="checkbox" value="1" name="sector_update" >
                        Sector Update</label>  
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn"></i>Save
                </button>
            </div>
        </form>
    </div>
    <!-- /.col-lg-6 (nested) -->
</div>

@endsection

@section('custom_scripts')
<script type="text/javascript">
    $('#pdfUploadForm').on('submit', (function (e) {
        e.preventDefault();
        formData = new FormData(this);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                $("#wait_msg").hide();
                $('#profile_img').css("background-image", "url(" + data.path + ")");
                $("#submitForm").prop('disabled', false);
                $("#pdf_file").val(data.path);

            },
            error: function (data) {
                alert("errors: try again");
                console.log(data);
            }

        });

    }));

    $("#research_pdf").on("change", function () {
        var ext = $('#research_pdf').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['pdf']) == -1) {
            $('#research_pdf').val('');
            alert('invalid extension! please upload only image file');

            return;
        }
        $("#wait_msg").show();
        $("#submitForm").prop('disabled', true);
        $("#pdfUploadForm").submit();

    });

    $("#submitForm").click(function () {
        $("#researchForm").submit();
    });

    $("#role").change(function () {

        if ($("#role :selected").text() == "User") {
            $("#userPrefrences").fadeIn();
        } else {
            $("#userPrefrences").fadeOut();
        }
    });


</script>
@endsection