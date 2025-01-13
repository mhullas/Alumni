<?php 
include 'admin/db_connect.php'; 
?>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


     <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

<!--owl slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- font awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />

<link href="css2/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css2/responsive.css" rel="stylesheet" />
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.card1 {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: Tomato;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-top-left-radius: 15px; /* Curves the top-right corner */
    border-bottom-left-radius: 15px; 
    border-top-right-radius: 15px; /* Curves the top-right corner */
    border-bottom-right-radius: 15px; /* Curves the bottom-right corner */
}

.alumni-list {
    cursor: pointer;
    border: unset;
    flex-direction: inherit;
}
.alumni-img {
    width: calc(30%);
    max-height: 30vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.alumni-list .card-body {
    width: calc(70%);
}
.alumni-img img {
    border-radius: 100%;
    max-height: calc(100%);
    max-width: calc(100%);
}
span.highlight {
    background: yellow;
}
.carousel, .carousel-inner, .carousel-item {
   min-height: calc(100%);
}
header.masthead, header.masthead:before {
        min-height: 50vh !important;
        height: 50vh !important;
}
.row-items {
    position: relative;
}
.card-left {
    left: 0;
}
.card-right {
    right: 0;
}
.rtl {
    direction: rtl;
}
.alumni-text {
    justify-content: center;
    align-items: center;
}
.masthead {
        min-height: 23vh !important;
        height: 23vh !important;
}
.masthead:before {
        min-height: 23vh !important;
        height: 23vh !important;
}
.alumni-list p {
    margin: unset;
}
</style>

<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">
        <h1 class="text-white display-1 mb-5">Alumni</h1>
        <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="filter-field"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" id="filter" placeholder="name, blood group, etc." aria-label="Filter" aria-describedby="filter-field">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" id="search">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 pt-2 ">
    <div class="row-items">
        <div class="col-lg-12">
            <div class="row ">
                <?php
                $fpath = 'admin/assets/uploads';
                $alumni = $conn->query("SELECT a.*, c.course, Concat(a.firstname, ' ', a.lastname) as name from alumnus_bio a inner join courses c on c.id = a.course_id order by Concat(a.firstname, ' ', a.lastname) asc");
                while ($row = $alumni->fetch_assoc()): ?>
                <div class="col-md-4 item ">
                    <div class="card1 alumni-list" data-id="<?php echo $row['id'] ?>">
                        <div class="alumni-img">
                            <img src="<?php echo $fpath.'/'.$row['avatar'] ?>" alt="">
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center h-100">
                                <div class="">
                                    <p class="filter-txt"><b><?php echo $row['name'] ?></b></p>
                                    <hr class="divider w-100" style="max-width: calc(100%)">
                                    <p class="filter-txt">Email: <b><?php echo $row['email'] ?></b></p>
                                    <p class="filter-txt">Phone: <b><?php echo $row['phonenumber'] ?></b></p>
                                    <p class="filter-txt">Batch: <b><?php echo $row['batch'] ?></b></p>
                                    <p class="filter-txt">Student ID: <b><?php echo $row['sid'] ?></b></p>
                                    <p class="filter-txt">Dept.: <b><?php echo $row['course'] ?></b></p>
                                    <p class="filter-txt">Blood Group: <b><?php echo $row['bloodgroup'] ?></b></p>
                                    <p class="filter-txt">Location: <b><?php echo $row['location'] ?></b></p>
                                    <p class="filter-txt">Currently working in/as <b><?php echo $row['connected_to'] ?></b></p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>


<script>
    // $('.card.alumni-list').click(function(){
    //     location.href = "index.php?page=view_alumni&id="+$(this).attr('data-id')
    // })
    $('.book-alumni').click(function(){
        uni_modal("Submit Booking Request","booking.php?alumni_id="+$(this).attr('data-id'))
    })
    $('.alumni-img img').click(function(){
        viewer_modal($(this).attr('src'))
    })
   
    $(document).ready(function() {
    // Search functionality
    $('#filter').keypress(function(e) {
        if (e.which === 13) {
            $('#search').trigger('click');
        }
    });

    $('#search').click(function() {
        var searchText = $('#filter').val().toLowerCase();
        $('.item').each(function() {
            var itemText = $(this).find('.filter-txt').text().toLowerCase();
            $(this).toggle(itemText.includes(searchText));
        });
    });
});

</script>