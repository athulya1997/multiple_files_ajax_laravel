@extends('layouts.layout')
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form id="add-btn" action="{{url('add-student')}}" method="POST" name="registration" enctype="multipart/form-data" >
      
        @csrf
      <div class="modal-body">
      <!-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> -->
            <div class="form-group mb-3">
                <label for="">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" >
                <!-- <span id="nameError" class="error"></span> -->
            </div>
            <div class="form-group mb-3">
                <label for="">Course</label>
                <input type="text" id="course" name="course" class="form-control" >
                <!-- <span id="courseError" class="error"></span> -->
            </div>
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" id="email" name="email" class="form-control" >
                <!-- <span id="emailError" class="error"></span> -->
            </div>
            <div class="form-group mb-3">
                <label for="">Phone No</label>
                <input type="text" id="phone" name="phone" class="form-control">
                <!-- <span id="phoneError" class="error"></span> -->
            </div>

      <!-- <div class="input-group">
            <input type="file" class="form-control file-input" name="files[]" multiple>
            <button class="btn btn-success add-field" type="button">Add File Field</button>
            <div class="form-group" id="file-fields-container">
            </div> -->
      <!-- <input type="file" class="form-control file-input" name="files[]" multiple> -->
      <!-- <div class="input-group-append">
        <button class="btn btn-danger remove-field" type="button">Remove</button>
      </div> -->
      <!-- </div> -->

            <div id="fileContainer">
                <div class="mb-3">
                    <input type="file" name="files[]" id="file" class="form-control-file" id="fileUpload" >
                    <!-- <span id="fileError" class="error"></span> -->
                    <button type="button" class="btn btn-primary" id="addFile">Add File</button>
                </div>
            </div>
           
           
  
            
             <!-- <div class="input-group mb-3 hdtuto control-group lst increment" >
               
                <input type="file" name="filenames[]" required class="myfrm form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                  </div>
              </div>

            <div class="clone hide">
            <div class="hdtuto control-group lst input-group" style="margin-top:10px">

                  <input type="file" name="filenames[]" class="myfrm form-control">

                    <div class="input-group-btn"> 

                    <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

                    </div>

              </div>

            </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit" id="submit">Save</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit & Update Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{url('update-student')}}" method="POST">
        @csrf
        
        <input type="text" id="stud_id" name="stud_id">
      <div class="modal-body">
            <div class="form-group mb-3">
                <label for="">Full Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Course</label>
                <input type="text" name="course" id="course" required class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="email" required class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Phone No</label>
                <input type="text" name="phone" id="phone" required class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- edit modal end -->
<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{url('delete-student')}}" method="POST">
        @csrf
        @method('DELETE')
        <h4>Confirm to delete data..?</h4>
        <input type="hidden" id="deleting_id" name="delete_stud_id">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes Delete</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- end delete modal -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Student Data
                        <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#exampleModal">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student as $item)
                            
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->course}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    <button type="button"  value="{{$item->id}}" class="btn btn-primary btn-sm editbtn">Edit</button>
                                </td>
                                <td>
                                    <button type="button"  value="{{$item->id}}" class="btn btn-danger btn-sm deletebtn">Delete</button>
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
@endsection
@section('style')
<style>
    .error {
      color: red;
    }
    .success {
      color: green;
    }
  </style>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
      $('#add-btn').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        // Remove any previous error messages
        $('.error').remove();

        // Validate form fields
        var isValid = true;

        // Check if name is empty
        var name = $('#name').val().trim();
        if (name === '') {
          $('<span class="error">Please enter your name</span>').insertAfter('#name');
          isValid = false;
        }

        var name = $('#course').val().trim();
        if (name === '') {
          $('<span class="error">Please enter your course</span>').insertAfter('#course');
          isValid = false;
        }

        // Check if email is empty or invalid format
        var email = $('#email').val().trim();
        var emailPattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        if (email === '') {
          $('<span class="error">Please enter your email</span>').insertAfter('#email');
          isValid = false;
        } else if (!emailPattern.test(email)) {
          $('<span class="error">Please enter a valid email</span>').insertAfter('#email');
          isValid = false;
        }

        // Check if mobile number is empty or invalid format
        var mobile = $('#phone').val().trim();
        var mobilePattern = /^[0-9]{10}$/;
        if (mobile === '') {
          $('<span class="error">Please enter your mobile number</span>').insertAfter('#phone');
          isValid = false;
        } else if (!mobilePattern.test(mobile)) {
          $('<span class="error">Please enter a valid 10-digit mobile number</span>').insertAfter('#phone');
          isValid = false;
        }

        // Check if file is selected and of the correct format
        var file = $('#file').val().trim();
        var allowedFormats = ['pdf', 'jpeg', 'jpg', 'png'];
        if (file === '') {
          $('<span class="error">Please select a file</span>').insertAfter('#file');
          isValid = false;
        } else {
          var fileExtension = file.split('.').pop().toLowerCase();
          if (allowedFormats.indexOf(fileExtension) === -1) {
            $('<span class="error">Please select a PDF or image file</span>').insertAfter('#file');
            isValid = false;
          }
        }

        // // Check if file is selected
        // var file = $('#file').val().trim();
        // if (file === '') {
        //   $('<span class="error">Please select a file</span>').insertAfter('#file');
        //   isValid = false;
        // }

        // If form is valid, submit it
        if (isValid) {
          // Perform form submission
          // this.submit();
         $.ajax({
                type: "POST",
                url: "/add-student/",
                data: $('#add-btn').serialize(), // Serialize the form data
                success: function(response){
                  console.log(response)
                  $('<span class="success">Form submitted successfully</span>').insertAfter('#submit');
                }
                
         });
          // Optionally, display success message
          // $('<span class="success">Form submitted successfully</span>').insertAfter('#submit');
        }
      });










      //   $('#add-btn').validate({
      // rules:{
      //   name:{
      //     required:true,
      //     name:true,
      //     minlength:4,
      //     maxlength:6
      //   },
      //   course:{
      //     required:true,
      //     place:true
      //   },
      //   email:{
      //     required:true,
      //     email:true
      //    },
      //   phone:{
      //     required:true,
      //     number:true
      //   },
      //   files: {
      //       required: true,
      //       accept: "image/*,application/pdf"
      //     }
        
      // },
    //   messages:{
    //     name:{
    //            required:"Enter first name",
    //            minlength:"Enter atleast 4 characters",
    //            maxlength:"Enter no more than 6 characters"
    //        },   
    //     email:{
    //       required:"Please enter your email",
    //       email:"Please enter a valid email address"
    //     },
    //     phone:{
    //       required:"Please enter your phone number",
    //       mob:"Please enter a valid phone number"
    //     },
    //     files: {
    //         required: "Please select a file",
    //         accept: "Only image and PDF files are allowed"
    //       },
    //   },
    //   submitHandler:function(form){
    //     form.submit();
    //   }
    // });



        // $.ajaxSetup({
        //     headers:{
        //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $(document).on('click','#add-btn',function(){
        // //  alert('jhhfhfhh');
        // //   e.preventDefault();
        //   let formData = new formData($('#add-btn')[0]);
        //   $.ajax({
        //     type:"POST",
        //     url:"/",
        //     data: formData,
        //     contentType:false,
        //     processData:false,
        //     success:function(response){
        //       if(response.status==400){
        //         $('#save_errorList').html("");
        //         $('#save_errorList').removeClass('d-none');
        //         $.each(response.errors,function(key,err_value){
        //             $('#save_errorList').append('<li>'+err_value+'</li>');
        //         });
        //       }
        //       else if(response.status==200){
        //         $('#save_errorList').html("");
        //         $('#save_errorList').removeClass('d-none');
        //         this.reset();
        //         $('#addExampleModal').modal('hide');
        //         alert(response.message);

        //       }
        //     }
        //   });
        // });

        $(document).on('click','.deletebtn',function(){
            var stud_id = $(this).val();
            alert(stud_id);
            $('#deleteModal').modal('show');
            $('#deleting_id').val(stud_id);
        });

        // $('#edit_btn').click(function(){
         $(document).on('click','.editbtn',function(){
            var stud_id = $(this).val();
            // alert(stud_id);
            $('#editModal').modal('show');
            $('#stud_id').val(stud_id);
            // alert(stud_id);
            $.ajax({
                type: "GET",
                url: "/edit-student/"+stud_id,
                success: function(response){
                    console.log(response);
                    $('#name').val(response.student.name);
                    $('#course').val(response.student.course);
                    $('#email').val(response.student.email);
                    $('#phone').val(response.student.phone);
                    $('#stud_id').val(stud_id);
                }
                
            });
        });
        
      // $(".btn-success").click(function(){ 
      //     var lsthmtl = $(".clone").html();
      //     $(".increment").after(lsthmtl);
      // });
      // $("body").on("click",".btn-danger",function(){ 
      //     $(this).parents(".hdtuto").remove();
      // });



  //     $(".add-field").click(function() {
  //   var fieldHtml = '<div class="input-group">' +
  //     '<input type="file" class="form-control file-input" name="files[]" multiple>' +
  //     '<div class="input-group-append">' +
  //     '<button class="btn btn-danger remove-field" type="button">Remove</button>' +
  //     '</div>' +
  //     '</div>';

  //   $("#file-fields-container").append(fieldHtml);
  // });

  // // Remove File Field
  // $("#file-fields-container").on("click", ".remove-field", function() {
  //   $(this).closest(".input-group").remove();
  // });
  



  $('#addFile').click(function() {
                var fileField = '<div class="mb-3">' +
                                    '<input type="file" name="files[]" class="form-control-file">' +
                                    '<button type="button" class="btn btn-danger removeFile">Remove</button>' +
                                '</div>';
                $('#fileContainer').append(fileField);
            });

            $(document).on('click', '.removeFile', function() {
                $(this).parent('.mb-3').remove();
            });
   
      
    // });
    // $(document).ready(function() {
        //     $("#add-btn").validate({
        //         rules: {
        //             name: "required",
        //             course:"required",
        //             email: {
        //                 required: true,
        //                 email: true
        //             },
        //             mobile:{
        //                 required:true,
        //                 mobile:true
        //             },
                    
        //         },
        //         messages: {
        //             name: "Please enter your name",
        //             course:"Please enter your course name"
        //             email: {
        //                 required: "Please enter your email address",
        //                 email: "Please enter a valid email address"
        //             },
        //             mobile:{
        //                 minlength:"Please enter Valid Mobile No.",
		    //             required:"Please enter Mobile No."
        //             },
                    
                   
        //         },
        //         submitHandler: function(form) {
        //             form.submit();
        //         }
        //     });
        });
</script>

@endsection