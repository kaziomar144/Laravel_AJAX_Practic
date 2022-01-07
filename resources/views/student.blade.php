<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Student AJAX 
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#studentAdd" class="btn btn-success">Add Student</a>
                            <a href="javascript:void(0)" class="btn btn-danger" id="deleteAllSelected">Delete All</a>
                        </div>
                        <div class="card-body">
                            <table id="studentTable" class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="chkCheckAll"></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tnody>
                                    @foreach ($students as $student)
                                    <tr id="sid{{$student->id}}">
                                        <td><input type="checkbox" name="ids" class="CheckBoxClass" value="{{$student->id}}"></td>
                                        <td>{{$student->firstname}}</td>
                                        <td>{{$student->lastname}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>
                                            <a class="btn btn-danger text-white" onclick="deleteStudent({{$student->id}})">Delete</a>
                                            <a href="javascript:void(0)" onclick="editStudent({{$student->id}})"  class="btn btn-info">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tnody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- student add modal --}}
  <!--ADD Modal -->
  <div class="modal fade" id="studentAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="studentForm">
                @csrf
                <div class="form-group">
                    <lable>First Name</lable>
                    <input type="text" class="form-control" id="firstname">
                </div>
                <div class="form-group">
                    <lable>Last Name</lable>
                    <input type="text" class="form-control" id="lastname">
                </div>
                <div class="form-group">
                    <lable>Email</lable>
                    <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <lable>Phone</lable>
                    <input type="text" class="form-control" id="phone">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>



     {{-- student Edit modal --}}
  <!--Edit Modal -->
  <div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form  id="studentEditForm">
                @csrf
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                    <lable>First Name</lable>
                    <input type="text" class="form-control" id="firstname2">
                </div>
                <div class="form-group">
                    <lable>Last Name</lable>
                    <input type="text" class="form-control" id="lastname2">
                </div>
                <div class="form-group">
                    <lable>Email</lable>
                    <input type="text" class="form-control" id="email2">
                </div>
                <div class="form-group">
                    <lable>Phone</lable>
                    <input type="text" class="form-control" id="phone2">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $("#studentForm").submit(function(e){
        e.preventDefault();

        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let _token = $("input[name='_token']").val();

        $.ajax({
            type: "post",
            url: "{{route('student.add')}}",
            data: {
                firstname:firstname,
                lastname:lastname,
                email:email,
                phone:phone,
                _token:_token
            },
            success: function (response) {
                console.log(response);
                if (response) {
                    $('#studentTable tbody').prepend(' <tr id="sid'+response.id+'"><td><input type="checkbox" name="ids" class="CheckBoxClass" value="'+response.id+'"></td><td>'+ response.firstname +'</td><td>'+ response.lastname +'</td><td>'+ response.email +'</td><td>'+ response.phone +'</td><td><a class="btn btn-danger text-white"  onclick="deleteStudent('+response.id+')">Delete</a> <a href="javascript:void(0)" onclick="editStudent('+response.id+')"  class="btn btn-info">Edit</a></td></tr>')
                    $("#studentForm")[0].reset();
                    $("#studentAdd").modal('hide');

                    toastr.success("Student Add Successfully");
                }
            }
        });
    });
});

function deleteStudent(id){
        if(confirm("Do want to delete this record?")){
            $.ajax({
                type: "delete",
                url: "/delete-students/"+id,
                data: {
                    _token: $("input[name='_token']").val()
                },
                
                success: function (response) {
                    $("#sid"+id).remove();
                    toastr.error(response.success);
                }
            });
        }
    }

    
</script>
<script>
   
      //  check and uncheck all check box

    $('#chkCheckAll').change(function () {
        $('.CheckBoxClass').prop('checked', this.checked);
        if(this.checked){
            $('#deleteAllSelected').show();
        }else{
            $('#deleteAllSelected').hide();
        }
    });
    $('#deleteAllSelected').hide();
    $('.CheckBoxClass').change(function () {
        if ($('.CheckBoxClass:checked').length == $('.CheckBoxClass').length) {
            $('#chkCheckAll').prop('checked', true);
        } else {
            $('#chkCheckAll').prop('checked', false);
        }
        if ($('.CheckBoxClass:checked').length == 0) {
            $('#deleteAllSelected').hide();
        }else{
        $('#deleteAllSelected').show();
    }
});
$("#deleteAllSelected").click(function (e) { 
    e.preventDefault();
    let allIds = [];

    $("input:checkbox[name=ids]:checked").each(function () {
        allIds.push($(this).val());
    })
    if(confirm("Do you want to delete all records")){
        $.ajax({
        type: "delete",
        url: "{{route('student.deleteSelected')}}",
        data: {
            _token: $("input[name='_token']").val(),
            ids: allIds
        },
        success: function (response) {
            $.each(allIds,function (key,val) {
                
                $('#sid'+val).remove();
            });
            toastr.error(response.success);
            $('#deleteAllSelected').hide();
        }
       });
    }
   });
</script>

<script>
    function editStudent(id){
        $.get("/student/"+id,
            function (student) {
                $('#id').val(student.id);
                $('#firstname2').val(student.firstname);
                $('#lastname2').val(student.lastname);
                $('#email2').val(student.email);
                $('#phone2').val(student.phone);
                $('#studentEditModal').modal('toggle');
            },
        );
    }

    $("#studentEditForm").submit(function (e) { 
        e.preventDefault();
        let id =  $('#id').val();
        let firstname = $("#firstname2").val();
        let lastname = $("#lastname2").val();
        let email = $("#email2").val();
        let phone = $("#phone2").val();
        let _token = $("input[name='_token']").val();
        
        $.ajax({
            
            url: "{{route('update.student')}}",
            type: "PUT",
            data: {
                id:id,
                firstname:firstname,
                lastname:lastname,
                phone:phone,
                email:email,
                _token:_token
            },
            success: function (response) {
                $('#sid' + response.id + ' td:nth-child(1)').text(response.firstname);
                $('#sid' + response.id + ' td:nth-child(2)').text(response.lastname);
                $('#sid' + response.id + ' td:nth-child(3)').text(response.email);
                $('#sid' + response.id + ' td:nth-child(4)').text(response.phone);
                $('#studentEditModal').modal('hide');
                $('#studentEditForm')[0].reset();
                toastr.success("Student Update Successfully");
            }
        });
    });
</script>

</body>
</html>