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


                <h2>REQUIREMENTS NEEDED TO COMPLY</h2>
                <div class="row">
                    <div class="col-md-6 border-top p-5">
                        <h2>FOR REGULAR STUDENTS/ FRESHMAN</h2>
                        <p class="text-justify">
                            1Form 138 ( High School Card)<br />
                            2. Form 137 ( Transcript of Records from High School)<br />
                            3. Good moral<br />
                            4. NSO Birth Certificate<br />
                            5. Ojt Certificate- for graduating only<br />
                            6. Ojt Evaluation- for graduating only<br />
                        </p>
                    </div>
                    <div class="col-md-6 border-top p-5">
                        <h2>FOR TRANSFEREE STUDENTS / OTHER MPCA BRANCH</h2>
                        <p class="text-justify">
                            1.Transcript of Record ( Transferee &amp; other Mpca Branch)<br />
                            Note: with Remarks “Copy for Montessori Professional Colleges of Asia Only” -for transferee only)<br />
                            2. Honorable Dismissal<br />
                            3. Good Moral<br />
                            4. NSO Birth Certificate- (Transferee &amp; other Mpca Branch)<br />
                            5. Ojt Certificate – for graduating only<br />
                            6. Ojt Evaluation- for graduating only<br />
                        </p>
                    </div>

                </div>

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
                            <a href="./freshproce.php" class="btn btn-primary">View Procedures</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 border-top pt-3">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title text-warning">Transferee/Other Branch</h5>
                            <p class="card-text">Transferees are students who have enrolled or taken college or
                                vocational units in other
                                colleges, universities or vocational schools.</p>
                            <a href="./transproce.php"" class=" btn btn-primary">View Procedures</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
<?php

include('./templates/footer.php');
?>