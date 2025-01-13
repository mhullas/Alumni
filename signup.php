<?php 
include 'admin/db_connect.php'; 
?>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap (if using) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<!-- Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<style>
    .masthead{
        min-height: 23vh !important;
        height: 23vh !important;
    }
     .masthead:before{
        min-height: 23vh !important;
        height: 23vh !important;
    }
    img#cimg{
        max-height: 10vh;
        max-width: 6vw;
    }
</style>
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            
            <h1 class="text-white display-1 mb-5">Sign Up Alumni</h1>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        
                    </div>
                    
                    <div class="input-group-append">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="container mt-3 pt-2">
               <div class="col-lg-12">
                   <div class="card mb-4">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="col-md-12">
                                    <form action="" id="create_account">
                                        <div class="row form-group">
                                            
                                            <div class="col-md-4">
                                                <label for="" class="control-label">First Name</label>
                                                <input type="text" class="form-control" name="firstname" placeholder="Enter first name"required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Last Name</label>
                                                <input type="text" class="form-control"placeholder="Enter last name" name="lastname" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Student ID</label>
                                                <input type="text" class="form-control" placeholder="Enter Student ID"name="sid" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Enter Phone number"name="phonenumber" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Blood Group</label>
                                                <input type="text" class="form-control"placeholder="Enter Blood group" name="bloodgroup" >
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Location</label>
                                                <input type="text" class="form-control"placeholder="Enter Location" name="location" >
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Gender</label>
                                                <select class="custom-select" name="gender" required>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Batch</label>
                                                <input type="input" class="form-control datepickerY" placeholder="Enter batch year"name="batch" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Department Graduated</label>
                                                <select class="custom-select select2" name="course_id" required>
                                                    <option></option>
                                                    <?php 
                                                    $course = $conn->query("SELECT * FROM courses order by course asc");
                                                    while($row=$course->fetch_assoc()):
                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['course'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-5">
                                                <label for="" class="control-label">Currently Connected To</label>
                                                <textarea name="connected_to" id="" cols="30" rows="3" class="form-control"placeholder="Enter Recent connection"></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="" class="control-label">Image</label>
                                                <input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
                                                <img src="" alt="" id="cimg">

                                            </div>  
                                        </div>
                                        <div class="row">
                                             <div class="col-md-4">
                                                <label for="" class="control-label">Email (Use your university email)</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="control-label">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password"required>
                                            </div>
                                        </div>
                                        <div id="msg">
                                            
                                        </div>
                                        <hr class="divider">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-primary">Create Account</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
                
            </div>


<script>
   $('.datepickerY').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
   })
   $('.select2').select2({
    placeholder:"Please Select Here",
    width:"100%"
   })
   function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$('#create_account').submit(function(e) {
    e.preventDefault();

    var email = $('#email').val();
    var validDomain = '@diu.edu.bd';
    if (!email.endsWith(validDomain)) {
        $('#msg').html('<div class="alert alert-danger">Email must end with ' + validDomain + '</div>');
        return;
    }

    console.log("Sending AJAX request");

    $.ajax({
        url: 'admin/ajax.php?action=signup',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        success: function(resp) {
            console.log("Response received:", resp);
            if (resp == 1) {
                location.replace('index.php');
            } else {
                $('#msg').html('<div class="alert alert-danger">Email already exists.</div>');
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
            $('#msg').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
        }
    });
});

</script>
