@extends('layouts.master')

@section('title')
    اضافه مورد
@endsection

@section('style')
<script src="{{ asset('assets/js/dropzone.js') }}"></script>

    {{-- <style>
        body {
            background: #EEE;
            font-family: 'Roboto', sans-serif;
        }

        .dropzone {
            width: 98%;
            margin: 1%;
            border: 2px dashed #3498db !important;
            border-radius: 5px;
            transition: .2s
        }

        .dropzone.dz-drag-hover {
            border: 2px solid #3498db !important;
        }

        .dz-message.needsclick {
            img width: 50px;
            display: block;
            margin: auto;
            opacity: .6;
            margin-bottom: 15px;

        }

        span.plus {
            display: none;
        }

        .dropzone.dz-started .dz-message {
            display: inline-block !important;
            width: 120px;
            float: right;
            border: 1px solid rgba(238, 238, 238, 0.36);
            border-radius: 30px;
            height: 120px;
            margin: 16px;
            transition: .2s
        }

        span.text {
            display: none
        }

        span.plus {
            display: block;
            font-size: 70px;
            color: #AAA;
            line-height: 110px
        }

    </style> --}}
    <style>
        	.dropzoneDragArea {
		    background-color: #fbfdff;
		    border: 1px dashed #c0ccda;
		    border-radius: 6px;
		    padding: 60px;
		    text-align: center;
		    margin-bottom: 15px;
		    cursor: pointer;
		}
		.dropzone{
			box-shadow: 0px 2px 20px 0px #f2f2f2;
			border-radius: 10px;
		}
    </style>

    {{-- SELECT FLAG COUNTRY --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/build/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/build/css/demo.css') }}"> --}}
@endsection


@section('content')
    <div class="container-fluid">

        <div class="mb-2">
            <a href="{{ route('suppliers.index') }}" class="btn btn-danger">رجوع</a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5>إضافة مورد</h5>
            </div>
            <div class="card-body">

                <form action="{{ route('suppliers.store') }}" method="post" name="demoform" id="demoform" class="dropzone" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <input type="hidden" class="userid" name="userid" id="userid" value="">

                        <div class="col-md-5">

                            {{-- SUPPLIER NAME --}}
                            <div class="form-group mb-2 mt-0 pt-0">
                                <label for="">اسم المورد</label>
                                <input class="form-control" type="text" name="name" id="">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- BALANCE --}}
                            <div class="form-group mb-2">
                                <label for="">رصيد المورد</label>
                                <input class="form-control" type="number" name="balance" id="balance" min="0">
                                @error('balance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- PHONE 1 --}}
                            <div class="form-group mb-2">
                                <label for="">رقم الاتصال الأساسي</label><br>
                                <input class="form-control" type="text" name="phone1" id="">
                                {{-- <input type="tel" id="phone" class="form-control" name="phone1" style="width: 100% !important"> --}}
                                @error('phone1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- PHONE2 --}}
                            <div class="form-group mb-2">
                                <label for="">رقم الاتصال الثانوي</label>
                                <input class="form-control" type="text" name="phone2" id="">
                                @error('phone2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="form-group mb-2">
                                <label for="">البريد الإلكتروني الأساسي</label>
                                <input class="form-control" type="text" name="email" id="">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- EMAIL2 --}}
                            <div class="form-group mb-2">
                                <label for="">البريد الإلكتروني الثانوي</label>
                                <input class="form-control" type="text" name="email2" id="">
                                @error('email2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- COMPANY NAME --}}
                            <div class="form-group mb-2">
                                <label for="">اسم المنشأة</label>
                                <input class="form-control" type="text" name="company_name" id="">
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- URL --}}
                            <div class="form-group mb-2">
                                <label for="">الموقع الالكتروني</label>
                                <input class="form-control" type="text" name="url" id="">
                                @error('url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- TAX NUMBER --}}
                            <div class="form-group mb-2">
                                <label for="">الرقم الضريبي</label>
                                <input class="form-control" type="text" name="tax_number" id="">
                                @error('tax_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- STATUS --}}
                            <div class="form-group mb-2">
                                <label for="">الحالة</label>
                                <select class="form-control" name="status" id="">
                                    <option value="0">نشط</option>
                                    <option value="1">غير نشط</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-7">
                            <div class="mr-md-4">

                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h5 class="text-primary">عنوان الفاتوره</h5>
                                    </div>
                                    <div class="card-body">

                                        {{-- COUNTRY --}}
                                        <div class="form-group mb-2">
                                            <label for="">الدوله</label>
                                            <select class="form-control" name="" id="">
                                                <option value="">مصر</option>
                                                <option value="">فلسطين</option>
                                            </select>
                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- CITY NAME --}}
                                        <div class="form-group mb-2">
                                            <label for="">المدينه</label>
                                            <input class="form-control" type="text" name="" id="city_id">
                                            @error('company_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- REGON NAME --}}
                                        <div class="form-group mb-2">
                                            <label for="">المنطقه</label>
                                            <input class="form-control" type="text" name="region_id" id="region_id">
                                            @error('region_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        {{-- ADRESS --}}
                                        <div class="form-group mb-2">
                                            <label for="">اسم الشارع</label>
                                            <input class="form-control" type="text" name="adress" id="">
                                            @error('adress')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- POSTAL CODE --}}
                                        <div class="form-group mb-
                                            <label for="">الرمز البريدي</label>
                                            <input class="form-control" type="number" name="postal_code" id="">
                                            @error('postal_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 mt-5">


                            <div >
                                {{-- <input type="file" id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea" name="file"> --}}
                                <input type="file" name="file" id="file">
                                <span>Upload file</span>
                            </div>
                            <div class="dropzone-previews" id="show_photos"></div>
                        </div>


                        <div class="col-12 mt-4">
                            <button class="btn btn-primary">حفظ</button>
                            <button class="btn btn-dark mr-2">اعادة تعيين</button>

                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
@endsection

@section('scripts')
<script>
      $(document).on('change','#file',function()
      {
        // alert(this).html();
        var photo = $(this).val();
        // $('#show_photos').html(photo);

        $.ajax(
        {
            url:"{{ url('/suppliers/storeimgae/') }}",
            type:"get",
            data:
            {
                'img': photo
            },
            dataType: 'json',
            success:function(data)
            {
                $("#dataTable").empty();
                if (data != '')
                {
                    $("#show_photos").append('<img src="">');
                } else
                {
                    $("#show_photos").append('<h1 class="text-center">لم يتم حفظ الصورة</h1>');
                }

            }
        });
      });
</script>
{{-- <script>
    Dropzone.autoDiscover = false;
    // Dropzone.options.demoform = false;
    let token   = $('meta[name="csrf-token"]').attr('content');
    $(function()
    {
    var myDropzone = new Dropzone("div#dropzoneDragArea",
    {
        paramName: "file",
        url: "{{ url('/suppliers/storeimgae') }}",
        previewsContainer: 'div.dropzone-previews',
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        params:
        {
            _token: token
        },

        // *********************************

         // The setting up of the dropzone
        init: function()
        {
            var myDropzone = this;

            //form submission code goes here
            $("form[name='demoform']").submit(function(event)
            {
                //Make sure that the form isn't actully being sent.
                event.preventDefault();

                URL = $("#demoform").attr('action');
                formData = $('#demoform').serialize();

                $.ajax(
                {
                    type: 'POST',
                    url: URL,
                    data: formData,
                    success: function(result)
                    {
                        if(result.status == "success")
                        {
                            // fetch the useid
                            var userid = result.user_id;
                            $("#userid").val(userid); // inseting userid into hidden input field
                            //process the queue
                            myDropzone.processQueue();
                        }else
                        {
                            console.log("error");
                        }
                    }
                });
            });

            // *********************

            //Gets triggered when we submit the image.
            this.on('sending', function(file, xhr, formData)
            {
                //fetch the user id from hidden input field and send that userid with our image
                let userid = document.getElementById('userid').value;
                formData.append('userid', userid);
            });

            this.on("success", function (file, response)
            {
                //reset the form
                $('#demoform')[0].reset();
                //reset dropzone
                $('.dropzone-previews').empty();
            });
            this.on("queuecomplete", function ()
            {

            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function()
            {
              // Gets triggered when the form is actually being sent.
              // Hide the success button or the complete form.
            });

            this.on("successmultiple", function(files, response)
            {
              // Gets triggered when the files have successfully been sent.
              // Redirect user or notify of success.
            });

            this.on("errormultiple", function(files, response)
            {
              // Gets triggered when there was an error sending the files.
              // Maybe show form again, and notify user of error
            });
        }
        });
    });
</script> --}}
@endsection
