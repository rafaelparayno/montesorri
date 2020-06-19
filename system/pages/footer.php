<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2019</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('textMessage');
</script>
<script>
    //Slider



    (function($) {
        "use strict";

        // Add active state to sidbar nav links
        var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

        // Toggle the side navigation
        $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
        });
    })(jQuery);
    //Slider
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    function fill(Value, sid) {

        //Assigning value to "search" div in "search.php" file.
        $('#receiverId').val(sid);
        $('#toSender').val(Value);
        $('#divdis').hide();
        //Hiding "display" div in "search.php" file.

        $('#displayUsersAdmin').hide();

    }
    //data table
    $(document).ready(function() {
        $('#dataTable').DataTable();


        //Registration toggling..
        $('input[name=payments]:radio').click(function() {
            var inputValue = $(this).attr("value");

            if (inputValue === "fullRadio") {
                $('#reg-full').show();
                $('#reg-down').hide();
            } else {
                $('#reg-full').hide();
                $('#reg-down').show();
            }

        });


        //Registration toggling..


        //for selection of courses

        $('select#courseselect').change(function(e) {
            var selectedcourse = $(this).children("option:selected").val();


            $.ajax({
                type: "post",
                url: "Students/ajax.php",
                data: {
                    coursesid: selectedcourse,
                },
                success: function(data) {

                    $('#ul1styears').empty();
                    $('#ul2ndyears').empty();
                    $('#ul3rdyears').empty();
                    $('#ul4thyears').empty();

                    var obj = jQuery.parseJSON(data);

                    for (var key in obj) {
                        var val = obj[key];
                        if (val.section_yr == 1) {
                            $('#ul1styears').append('<li>' + val.section_name + `</li><a class="btn btn-sm btn-primary" href="./studentSubject.php?lvl=1&cid=${selectedcourse}">View Subjects</a>`)
                        }

                        if (val.section_yr == 2) {
                            $('#ul2ndyears').append('<li>' + val.section_name + `</li><a class="btn btn-sm btn-primary" href="./studentSubject.php?lvl=2&cid=${selectedcourse}">View Subjects</a>`)
                        }
                        if (val.section_yr == 3) {
                            $('#ul3rdyears').append('<li>' + val.section_name + `</li><a class="btn btn-sm btn-primary" href="./studentSubject.php?lvl=3&cid=${selectedcourse}">View Subjects</a>`)
                        }
                        if (val.section_yr == 4) {
                            $('#ul4thyears').append('<li>' + val.section_name + `</li><a class="btn btn-sm btn-primary" href="./studentSubject.php?lvl=4&cid=${selectedcourse}">View Subjects</a>`)
                        }

                    }

                }
            });


        });



        //for selection of courses
        $('select#yearLevelSelect').change(function(e) {
            var selectedYr = $(this).children("option:selected").val();



            $.ajax({
                type: "post",
                url: "Students/ajax.php",
                data: {
                    sectionyr: selectedYr,
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    $("#sectionsSelect").empty();
                    for (var key in obj) {
                        var val = obj[key];

                        $("#sectionsSelect").append('<option value=' + val.section_id + '>' + val.section_name + '</option>');
                        $("#sectionsSelect").removeAttr('disabled');
                    }

                    $('#sectionsSelect').change();
                }

            });


        });

        $('select#studType').change(function(e) {
            var val = $(this).children("option:selected").val();
            $('#unitsDiv').toggle();


        });

        $('#searchBtnGrade').on('click', () => {
            let sno = $('#searchStudentNo').val();

            $.ajax({
                type: "post",
                url: "Students/ajax.php",
                data: {
                    studentSnoGrade: sno,
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);

                    $("#tableGrades").empty();
                    for (var key in obj) {
                        var val = obj[key];
                        let finalGrade = 0;
                        let results = "No Grade";
                        let prelimGrade = val.prelim ? val.prelim : 0;
                        let midtermGrade = val.midterm ? val.midterm : 0;
                        let finalsGrade = val.finals ? val.finals : 0;

                        if (val.prelim && val.midterm && val.finals) {
                            finalGrade = computeGradeAvg(prelimGrade, midtermGrade, finalsGrade);
                            results = getStatus(finalGrade);
                        }

                        // $("#displayUsersAdmin").append('<p onclick="fill(\'' + val.username + '\')">' + val.username + '</p>');
                        $("#tableGrades").append(`<tr>
                                    <td>${val.sno}</td>
                                    <td>${val.StudentName}</td>
                                    <td>${val.subjectname}</td>
                                    <td>${val.section_name}</td>
                                    <td>${val.subject_units}</td>
                                    <td>${prelimGrade}</td>
                                    <td>${midtermGrade}</td>
                                    <td>${finalsGrade}</td>
                                    <td>${finalGrade}</td>
                                    <td>${results}</td>
                                    <td>                                   
                                        <a class="btn btn-block btn-info" href="./addStudentGrades.php?sno=${val.sno}&sid=${val.subject_id}">Edit</a>
                                    </td>
                                </tr>`);

                    }


                }

            });

        });


        $('#searchBtnCurriculim').on('click', () => {
            let code = $('#searchCourseCur').val();

            $.ajax({
                type: "post",
                url: "Students/ajax.php",
                data: {
                    searchCode: code,
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);

                    $("#table3Cur").empty();
                    $("#table2Cur").empty();
                    $("#table1Cur").empty();
                    for (var key in obj) {
                        var val = obj[key];
                        if (val.subyr == 1) {
                            $('#table1Cur').append(`<tr>
                                    <td>${val.subjectcode}</td>
                                    <td>${val.subjectname}</td>
                                    <td>${val.subject_units}</td>
                                    <td>${val.schoolterm}</td>
                                </tr>`)
                        }
                        if (val.subyr == 2) {
                            $('#table2Cur').append(`<tr>
                                    <td>${val.subjectcode}</td>
                                    <td>${val.subjectname}</td>
                                    <td>${val.subject_units}</td>
                                    <td>${val.schoolterm}</td>
                                </tr>`)
                        }

                        if (val.subyr == 3) {
                            $('#table3Cur').append(`<tr>
                                    <td>${val.subjectcode}</td>
                                    <td>${val.subjectname}</td>
                                    <td>${val.subject_units}</td>
                                    <td>${val.schoolterm}</td>
                                </tr>`)
                        }

                    }


                }

            });

        });

        const computeGradeAvg = (prelim, midterm, final) => {

            let averageGrade = (Number(prelim) + Number(midterm) + Number(final)) / 3;
            let finalGrade = 0;
            if (averageGrade < 75) {
                finalGrade = 5.0;
            } else if (averageGrade < 80) {
                finalGrade = 3.0;
            } else if (averageGrade < 84) {
                finalGrade = 2.5;
            } else if (averageGrade < 88) {
                finalGrade = 2.25;
            } else if (averageGrade < 92) {
                finalGrade = 2.0;
            } else if (averageGrade < 96) {
                finalGrade = 1.5;
            } else if (averageGrade < 100) {
                finalGrade = 1.25;
            }

            return finalGrade;
        }

        function getStatus(finalGrade) {
            let results = "";

            if (finalGrade > 3) {
                results = 'Failed';
            } else {
                results = 'Passed';
            }

            return results;

        }

        //for selectiong sno in student users
        $('select#snoStudentSelect').change(function(e) {
            var selectedSno = $(this).children("option:selected").val();



            $.ajax({
                type: "post",
                url: "Students/ajax.php",
                data: {
                    studentSno: selectedSno,
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    // for (var key in obj) {
                    //     var val = obj[key];

                    //     $('#studentUsername').val(val.EmailAdd);
                    //     console.log(val.)
                    // }
                    $('#studentuser').val(obj['EmailAdd']);
                    console.log(obj['EmailAdd']);

                }

            });


        });

        //for selectiong sno in student users

        //generating password
        $('#generatePass').on('click', () => {
            var passwordGenerated = generatedChars(8);
            // alert(passwordGenerated);

            $('#generatedPass').val(passwordGenerated);
        });
        $('#generatePass2').on('click', () => {
            var passwordGenerated = generatedChars(8);
            // alert(passwordGenerated);

            $('#generatedPassAdmin').val(passwordGenerated);
        });
        //generating password
        function generatedChars(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }

        //modalResetPassword
        $('#resetPassword').on('show.bs.modal', function(e) {
            var userid = $(e.relatedTarget).data('userid');
            $(e.currentTarget).find('input[name="useridModalReset"]').val(userid);
        });
        //modalResetPassword

        //EDITS

        $('#editModalCourse').on('show.bs.modal', function(e) {
            const courseId = $(e.relatedTarget).data('courseid');
            const code = $(e.relatedTarget).data('code');
            const coursename = $(e.relatedTarget).data('name');

            $(e.currentTarget).find('input[name="courseidModal"]').val(courseId);
            $(e.currentTarget).find('input[name="coursecodeEdit"]').val(code);
            $(e.currentTarget).find('input[name="courseNameEdit"]').val(coursename);
        });


        $('#editModalStrand').on('show.bs.modal', function(e) {
            const strandid = $(e.relatedTarget).data('strandid');
            const code = $(e.relatedTarget).data('code');
            const name = $(e.relatedTarget).data('name');

            $(e.currentTarget).find('input[name="strandId"]').val(strandid);
            $(e.currentTarget).find('input[name="strandcodeEdit"]').val(code);
            $(e.currentTarget).find('input[name="strandNameEdit"]').val(name);
        });



        $('#editModalSubjects').on('show.bs.modal', function(e) {
            const subid = $(e.relatedTarget).data('subid');
            const code = $(e.relatedTarget).data('code');
            const name = $(e.relatedTarget).data('name');
            const unit = $(e.relatedTarget).data('units');
            const yr = $(e.relatedTarget).data('yr');

            $(e.currentTarget).find('input[name="strandId"]').val(subid);
            $(e.currentTarget).find('input[name="subcodeEdit"]').val(code);
            $(e.currentTarget).find('input[name="subnameEdit"]').val(name);
            $(e.currentTarget).find('input[name="subunitEdit"]').val(unit);
            $(e.currentTarget).find('input[name="subyrEdit"]').val(yr);
        });

        $('#editModalSections').on('show.bs.modal', function(e) {
            const sectid = $(e.relatedTarget).data('sectid');
            const yr = $(e.relatedTarget).data('yr');
            const name = $(e.relatedTarget).data('name');


            $(e.currentTarget).find('input[name="sectIdEdit"]').val(sectid);
            $(e.currentTarget).find('input[name="sectyrEdit"]').val(yr);
            $(e.currentTarget).find('input[name="sectnameEdit"]').val(name);
        });


        //EDITS



        //ajax for to Message//
        $('#search').keyup(function(e) {
            var searchKeys = $(this).val();
            var role = $('#userRoleMessage').val();


            // alert(role);
            $.ajax({
                type: "post",
                url: "Students/ajax.php",
                data: {
                    toMessage: searchKeys,
                    userole: role,
                },
                success: function(data) {
                    var obj = jQuery.parseJSON(data);

                    $("#displayUsersAdmin").empty();
                    for (var key in obj) {
                        var val = obj[key];

                        // $("#displayUsersAdmin").append('<p onclick="fill(\'' + val.username + '\')">' + val.username + '</p>');
                        $("#displayUsersAdmin").append(`<p onclick="fill('${val.username}','${val.acc_id}')">${val.username}</p>`);

                    }

                    // $('#sectionsSelect').change();
                }

            });


        });


        //ajax for to Message//


    });
    //dataTable

    //form multiform
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        var sub = document.getElementById("nextBtn");
        // var sub2 = document.getElementById("submitButtonEditStud");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            sub.type = 'Submit';
            // sub2.type = 'Submit';
            document.getElementById("regForm").submit();
            document.getElementById("regForm2").submit();

        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
</script>
</body>

</html>