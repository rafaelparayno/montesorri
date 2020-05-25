<?php
    include('./templates/header.php');
    include('./templates/navigationhome.php');
?>


<main>

<section id="hero-section">
    <div class="container-fluid m-0 p-0">
        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./assets/img/slider2.jpg');" class="hero-image">
            <div class="hero-text">
                <h4>Be an Monterssori Student</h4>
            </div>
        </div>
    </div>
</section>

<section id="addmision">
    <div class="container py-4 text-center">
        <div class="py-2">
            <h2>ADMISSION PROCEDURES</h2>
            <p>Our objective is to give easy to understand teachings in order for the students to pass and never fail in every subject enrolled.</p>
        </div>
        <div class="row mx-2">

            <div class="col-md-6 border-top pt-3">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title text-warning">Freshmen Students</h5>
                        <p class="card-text">Freshmen applicants are those who have completed middle school
                            (senior high) making
                            them
                            eligible to apply for college education</p>
                        <a href="#" class="btn btn-primary">View Procedures</a>
                    </div>
                </div>
                <!-- <h4 class="text-warning">Freshmen Students</h4>
                <p class="">Freshmen applicants are those who have completed middle school (senior high) making
                    them
                    eligible to apply for college education.</p>
                <a href="#" class="btn btn-primary btn-lg  mb-3">How To Enroll</a> -->
            </div>
            <div class="col-md-6 border-top pt-3">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title text-warning">Transferee/Other Branch</h5>
                        <p class="card-text">Transferees are students who have enrolled or taken college or
                            vocational units in other
                            colleges, universities or vocational schools.</p>
                        <a href="#" class="btn btn-primary">View Procedures</a>
                    </div>
                </div>
                <!-- <h4 class="text-warning ">Transferee/Other Branch</h4>
                <p>
                    Transferees are students who have enrolled or taken college or vocational units in other
                    colleges, universities or vocational schools.
                </p>
                <a href="#" class="btn btn-primary btn-lg">How To Enroll</a> -->
            </div>
        </div>
    </div>
</section>
</main>
<?php
   
    include('./templates/footer.php');
?>