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
    /* Card styles */
    .card.job-list {
        position: relative;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .card-body {
        position: relative;
        padding: 15px;
    }

    .filter-txt {
        display: block;
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
    }

    /* Truncate the description with ellipsis */
    .truncate {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Number of lines to show before truncating */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Additional responsiveness */
    @media (max-width: 768px) {
        .card-body {
            padding: 10px;
        }
    }

    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .gallery-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }

    .gallery-img, .gallery-list .card-body {
        width: calc(50%);
    }

    .gallery-img img {
        border-radius: 5px;
        min-height: 50vh;
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

    .masthead {
        min-height: 23vh !important;
        height: 23vh !important;
    }

    .masthead:before {
        min-height: 23vh !important;
        height: 23vh !important;
    }
</style>

<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">
        <h1 class="text-white display-1 mb-5">Alumni's Jobs Post</h1>
        <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="filter-field"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Filter" id="filter" aria-label="Filter" aria-describedby="filter-field">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" id="search">Search</button>
                </div>
            </div>
        </div>
        <div class="row col-md-12 mb-2 justify-content-center">
            <button class="btn btn-primary btn-block col-sm-4" type="button" id="new_career"><i class="fa fa-plus"></i> Post a Job Opportunity</button>
        </div>
    </div>
</div>

<div class="container mt-3 pt-2">
    <?php
    $event = $conn->query("SELECT c.*,u.name FROM careers c INNER JOIN users u ON u.id = c.user_id ORDER BY c.id DESC");
    while ($row = $event->fetch_assoc()):
        $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        $desc = strtr(html_entity_decode($row['description']), $trans);
        $desc = str_replace(["<li>", "</li>"], ["", ","], $desc);
    ?>
    <div class="card job-list" data-id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?>">
        <div class="card-body">
            <div class="row align-items-center justify-content-center text-center h-100">
                <div class="col">
                    <h3><b class="filter-txt"><?php echo htmlspecialchars(ucwords($row['job_title']), ENT_QUOTES); ?></b></h3>
                    <div>
                        <span class="filter-txt"><small><b><i class="fa fa-building"></i> <?php echo htmlspecialchars(ucwords($row['company']), ENT_QUOTES); ?></b></small></span>
                        <span class="filter-txt"><small><b><i class="fa fa-map-marker"></i> <?php echo htmlspecialchars(ucwords($row['location']), ENT_QUOTES); ?></b></small></span>
                    </div>
                    <hr>
                    <p class="truncate filter-txt"><?php echo htmlspecialchars(strip_tags($desc), ENT_QUOTES); ?></p>
                    <hr class="divider" style="max-width: calc(80%)">
                    <span class="badge badge-info float-left px-3 pt-1 pb-1">
                        <b><i>Posted by: <?php echo htmlspecialchars($row['name'], ENT_QUOTES); ?></i></b>
                    </span>
                    <button class="btn btn-primary float-right read_more" data-id="<?php echo htmlspecialchars($row['id'], ENT_QUOTES); ?>">Read More</button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php endwhile; ?>
</div>
<script>
    // Ensure the required functions are defined in your scripts
    function start_load() {
        // Function to show loading indicator (if needed)
    }

    function end_load() {
        // Function to hide loading indicator (if needed)
    }

    $('#new_career').click(function(){
        uni_modal("New Job Hiring", "manage_career.php", 'mid-large');
    });

    $('.read_more').click(function(){
        uni_modal("Career Opportunity", "view_jobs.php?id=" + $(this).data('id'), 'mid-large');
    });

    $('#filter').keypress(function(e){
        if (e.which === 13) {
            $('#search').trigger('click');
        }
    });

    $('#search').click(function(){
        var txt = $('#filter').val().toLowerCase().trim();
        start_load();
        if (txt === '') {
            $('.job-list').show();
        } else {
            $('.job-list').each(function(){
                var content = $(this).find(".filter-txt").map(function(){
                    return $(this).text().toLowerCase();
                }).get().join(' ');
                
                if (content.includes(txt)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
        end_load();
    });
</script>
