<!DOCTYPE html>
<html lang="en" style="background: white;">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings LIMIT 1")->fetch_array();
        foreach ($query as $key => $value) {
            if (!is_numeric($key))
                $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');
    ?>
   
    <style>
        /* styles.css */
body {
    margin: 0;
    padding: 0;
}

.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 50%;
    font-size: 24px;
    display: none; /* Hidden by default */
    z-index: 1000;
    text-align: center;
    line-height: 1;
    cursor: pointer;
    transition: background-color 0.3s, opacity 0.3s;
}

.back-to-top:hover {
    background-color: #0056b3;
}

.back-to-top i {
    margin: 0;
}

/* For large screens, ensure visibility and spacing */
@media (min-width: 768px) {
    .back-to-top {
        font-size: 30px;
        padding: 15px;
    }
}

        .jumbotron {
            background: linear-gradient(rgba(40, 120, 235, 0.9), rgba(40, 120, 235, 0.9)), url(assets/img/header.jpg), no-repeat center center;
            background-size: cover;
        }
        .bg-dark {
            background-color: black !important;
        }
        .bg-image {
    background: linear-gradient(rgba(40, 120, 235, 0.05), rgba(40, 120, 235, 0.05)), url(assets/img/bg-image.jpg);
    background-attachment: fixed;
}
        .container-fluid, .container-sm, .container-md, .container-lg, .container-xl {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            background: white;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .overlay-bottom::after {
            bottom: 0;
            background: url(assets/img/overlay-bottom.png) bottom center no-repeat;
            background-size: contain;
        }
        .overlay-top::before {
    top: 0;
    background: url(assets/img/overlay-top.png) top center no-repeat;
    background-size: contain;
}
.overlay-top::before, .overlay-bottom::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 85px;
    left: 0;
    z-index: 1;
}
        #viewer_modal .btn-close {
            position: absolute;
            z-index: 999999;
            background: unset;
            color: white;
            border: unset;
            font-size: 27px;
            top: 0;
        }
        #viewer_modal .modal-dialog {
            width: 80%;
            max-width: unset;
            height: calc(90%);
            max-height: unset;
        }
        #viewer_modal .modal-content {
            background: black;
            border: unset;
            height: calc(100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #viewer_modal img, #viewer_modal video {
            max-height: calc(100%);
            max-width: calc(100%);
        }
        body, footer {
            background: #000000e6 !important;
        }
        a.jqte_tool_label.unselectable {
            height: auto !important;
            min-width: 4rem !important;
            padding: 5px;
        }
    </style>
    <body>
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white"></div>
    </div>

    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+8801913455635</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>alumni@diu.edu.bd</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a class="navbar-brand js-scroll-trigger" href="./">
            <img height="40" width="50" src="assets/img/logo.jpeg" alt="">
            <b><?php echo $_SESSION['system']['name'] ?></b>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=alumni_list">Alumni</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=gallery">Gallery</a></li>
                <?php if (isset($_SESSION['login_id'])): ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=careers">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=forum">Posts</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                <?php if (!isset($_SESSION['login_id'])): ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#" id="login">Login</a></li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle js-scroll-trigger" href="#" id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> <i class=""></i></a>
                        <div class="dropdown-menu" aria-labelledby="account_settings">
                            <a class="dropdown-item" href="index.php?page=my_account" id="manage_my_account"><i class="fa fa-cog"></i> Update Account</a>
                            <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <a href="index.php?page=signup" class="btn btn-primary py-2 px-4 d-none d-lg-block">Join Us</a>
        </div>
    </nav>
</div>
    <!-- Navbar End -->

    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "home";
        include $page . '.php';
    ?>

    <!-- Modals -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='confirm'>Continue</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   
</div>

    <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

     <!-- Footer Start -->
     <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                    <img height="40" width="50" src="assets\img\logo.jpeg" alt=""> <br> 
                <b><a class="navbar-brand js-scroll-trigger text-white" href="./"><?php echo $_SESSION['system']['name'] ?></a></b>
                    </a>
                    <p class="m-0">Daffodil International University (DIU) alumni are a diverse and accomplished group of individuals who have graduated from this renowned private university in Dhaka, Bangladesh. With a strong foundation in various academic disciplines, DIU alumni have made significant contributions to their respective fields, including business, technology, engineering, healthcare, education, and the arts.</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Newsletter</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Ashulia, Birulia, Savar, Dhaka, Bangladesh</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+880191213123</p>
                    <p><i class="fa fa-envelope mr-2"></i>alumni@diu.edu.bd</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Our Services</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="index.php?page=alumni_list"><i class="fa fa-angle-right mr-2"></i>All Alumni</a>
                        <a class="text-white-50 mb-2" href="index.php?page=gallery"><i class="fa fa-angle-right mr-2"></i>Gallery</a>
                        <a class="text-white-50 mb-2" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>About</a>
                        <a class="text-white-50 mb-2" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>Research</a>
                        <a class="text-white-50" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                        <a class="text-white-50 mb-2" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>Terms & Condition</a>
                        <a class="text-white-50 mb-2" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>Regular FAQs</a>
                        <a class="text-white-50 mb-2" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>Help & Support</a>
                        <a class="text-white-50" href="index.php?page=about"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important; ">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">Daffodil Alumni</a>. All Rights Reserved.
                    </p>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top">
        <i class="fa fa-angle-double-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template JavaScript -->
<script src="js/main.js"></script>
    <!-- Template JavaScript -->
    <script src="js/main.js"></script>
    <script>
         $(document).ready(function() {
        $('#login').click(function() {
            uni_modal("Login", 'login.php');
        });

        // Ensure Bootstrap dropdown functionality
        $('body').on('click', function (e) {
            if (!$(e.target).closest('.dropdown-toggle').length) {
                $('.dropdown-menu').hide();
            }
        });

        $('.dropdown-toggle').on('click', function() {
            $(this).next('.dropdown-menu').toggle();
        });
    });

    // Function to load content into a modal and show it
    function uni_modal(title, url) {
        $.ajax({
            url: url,
            success: function (response) {
                $('#uni_modal .modal-title').html(title);
                $('#uni_modal .modal-body').html(response);
                $('#uni_modal').modal('show');
            },
            error: function (xhr, status, error) {
                console.log('Error:', status, error);
            }
        });
    }

    // Example function for confirming actions
    function confirm_modal(title, message, action) {
        $('#confirm_modal .modal-title').html(title);
        $('#confirm_modal #delete_content').html(message);
        $('#confirm_modal #confirm').off('click').on('click', function() {
            $.ajax({
                url: action,
                method: 'POST',
                success: function (response) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.log('Error:', status, error);
                }
            });
        });
        $('#confirm_modal').modal('show');
    } 
    function uni_modal(title, url, size) {
            $('#uni_modal').modal('show');
            $.ajax({
                url: url,
                type: 'GET',
                success: function (response) {
                    $('#uni_modal .modal-title').html(title);
                    $('#uni_modal .modal-body').html(response);
                    $('#uni_modal').modal('show');
                    if (size) {
                        $('#uni_modal').find('.modal-dialog').addClass(size);
                    }
                }
            });
        }

        // Event to trigger new topic creation
        $('#new_forum').click(function () {
            uni_modal("Create New Topic", 'manage_forum.php', 'modal-lg');
        });

        // Event to handle form submission
        $(document).on('submit', '#manage_forum_form', function (e) {
            e.preventDefault();
            $.ajax({
                url: 'admin/ajax.php?action=save_forum',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response == 1) {
                        alert_toast("Topic successfully created", 'success');
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
                    } else {
                        alert_toast("An error occurred while creating the topic", 'danger');
                    }
                }
            });
        });
        // scripts.js
document.addEventListener('DOMContentLoaded', function () {
    var backToTopButton = document.querySelector('.back-to-top');

    // Show button when scrolled 100px from the top
    window.addEventListener('scroll', function () {
        if (window.scrollY > 100) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    // Scroll to top when button is clicked
    backToTopButton.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});

    </script>
</body>
</html>
   
