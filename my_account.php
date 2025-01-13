<?php 

include 'admin/db_connect.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/select2.min.css">
    <link rel="stylesheet" href="path/to/datepicker.min.css">
    <style>
        .masthead {
            min-height: 23vh !important;
            height: 23vh !important;
        }
        .masthead:before {
            min-height: 23vh !important;
            height: 23vh !important;
        }
        img#cimg {
            max-height: 10vh;
            max-width: 6vw;
        }
    </style>
</head>
<body>
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center my-5 py-5">
            
            <h1 class="text-white display-1 mb-5">Update Account</h1>
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
                            <form action="admin/ajax.php?action=update_account" id="update_account" method="POST" enctype="multipart/form-data">
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="control-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="<?php echo htmlspecialchars($_SESSION['bio']['firstname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="<?php echo htmlspecialchars($_SESSION['bio']['lastname'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Student ID</label>
                                        <input type="text" class="form-control" name="sid" value="<?php echo htmlspecialchars($_SESSION['bio']['sid'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phonenumber" value="<?php echo htmlspecialchars($_SESSION['bio']['phonenumber'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Blood Group</label>
                                        <input type="text" class="form-control" name="bloodgroup" value="<?php echo htmlspecialchars($_SESSION['bio']['bloodgroup'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Location</label>
                                        <input type="text" class="form-control" name="location" value="<?php echo htmlspecialchars($_SESSION['bio']['location'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Gender</label>
                                        <select class="custom-select" name="gender" required>
                                            <option value="Male" <?php echo ($_SESSION['bio']['gender'] ?? '') == 'Male' ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo ($_SESSION['bio']['gender'] ?? '') == 'Female' ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Batch</label>
                                        <input type="text" class="form-control datepickerY" name="batch" value="<?php echo htmlspecialchars($_SESSION['bio']['batch'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Course Graduated</label>
                                        <select class="custom-select select2" name="course_id" required>
                                            <option></option>
                                            <?php 
                                            $course = $conn->query("SELECT * FROM courses ORDER BY course ASC");
                                            while($row = $course->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($_SESSION['bio']['course_id'] ?? '') == $row['id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($row['course'], ENT_QUOTES, 'UTF-8'); ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-5">
                                        <label for="" class="control-label">Currently Connected To</label>
                                        <textarea name="connected_to" id="" cols="30" rows="3" class="form-control"><?php echo htmlspecialchars($_SESSION['bio']['connected_to'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="control-label">Image</label>
                                        <input type="file" class="form-control" name="img" onchange="displayImg(this)">
                                        <img src="admin/assets/uploads/<?php echo htmlspecialchars($_SESSION['bio']['avatar'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" alt="" id="cimg">
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Email (Use your university email)</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_SESSION['bio']['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                        <small><i>Leave this blank if you don't want to change your password</i></small>
                                    </div>
                                </div>
                                <div id="msg"></div>
                                <hr class="divider">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Update Account</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/bootstrap.bundle.min.js"></script>
    <script src="path/to/select2.min.js"></script>
    <script src="path/to/datepicker.min.js"></script>
    <script>
    $(document).ready(function(){
    // Initialize Datepicker
    $('.datepickerY').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
    });

    // Initialize Select2
    $('.select2').select2();

    // Function to display the selected image
    function displayImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Handle form submission
    $('#update_account').submit(function(e){
        e.preventDefault(); // Prevent the default form submission

        var emailField = $('input[name="email"]');
        var email = emailField.val();
        var emailPattern = /^[a-zA-Z0-9._%+-]+@diu\.edu\.bd$/;
        
        // Email validation
        if (!emailPattern.test(email)) {
            $('#msg').html('<div class="alert alert-danger">Please enter a valid email address ending with @diu.edu.bd</div>');
            return; // Stop form submission
        }

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr('action'), // Use the form's action attribute
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            success: function(response) {
                
                // Check if response indicates success
                if (response == 55) {
                    setTimeout(function() {
                    location.reload(); // Reload the page after saving
                }, 1000); // Adjust delay as needed
                }
            },
            error: function(){
                $('#msg').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
            }
        });
    });

    // Bind change event to file input for image preview
    $('input[name="img"]').change(function() {
        displayImg(this);
    });
});

    </script>
</body>
</html>

