@extends('layouts.layout')
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{url('add-student')}}" method="POST" name="registration" enctype="multipart/form-data" >
      
        @csrf
      <div class="modal-body">
            <div class="form-group mb-3">
                <label for="">Full Name</label>
                <input type="text" name="name" required class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Course</label>
                <input type="text" name="course" required class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="email" required class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="">Phone No</label>
                <input type="text" name="phone" required class="form-control">
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
                    <input type="file" name="files[]" class="form-control-file" id="fileUpload">
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
        <button type="submit" class="btn btn-primary">Save</button>
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
@section('scripts')
<script>
    $(document).ready(function(){
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
  $(document).ready(function() {
        $('form').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            var file = $('#fileUpload').get(0).files[0]; // Get the selected file

            // Validate the file type and size
            if (file) {
                var fileType = file.type;
                var fileSize = file.size;

                // Define the allowed file types and maximum size
                var allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
                var maxSize = 5242880; // 5MB

                // Perform the validation
                if (allowedTypes.indexOf(fileType) === -1) {
                    alert('Invalid file type. Please upload a JPEG, PNG, or PDF file.');
                    return false;
                }

                if (fileSize > maxSize) {
                    alert('File size exceeds the maximum limit of 5MB.');
                    return false;
                }
            }

            // If the file is valid, submit the form
            this.submit();
        });
    });


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
   
      
    });
</script>

@endsection