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


    //data table
    $(document).ready(function() {
        $('#dataTable').DataTable();


        $('select#courseselect').change(function(e) {
            var selectedcourse = $(this).children("option:selected").val();
            // var firstyears = $('#ul1styears');
            // var secondyears = $('#ul2ndyears');
            // var thirdyears = $('#ul3rdyears');
            // var fourthyears = $('#ul4thyears');


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
                            $('#ul1styears').append('<li>' + val.section_name + '</li><a class="btn btn-sm btn-primary" href="#">View Subjects</a>')
                        }

                        if (val.section_yr == 2) {
                            $('#ul2ndyears').append('<li>' + val.section_name + '</li>')
                        }
                        if (val.section_yr == 3) {
                            $('#ul3rdyears').append('<li>' + val.section_name + '</li>')
                        }
                        if (val.section_yr == 4) {
                            $('#ul4thyears').append('<li>' + val.section_name + '</li>')
                        }

                    }

                }
            });


        });
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


    // $(document).ready(function() {

    // });


    // function changeCoursesCombo(){

    // }
    // $.ajax({
    //     uri: "Students/ajax.php",
    //     type: "post",
    //     data: {
    //         courseid : $(this).data("id"),
    //         success: function(result) {
    //             console.log($result);
    //         }
    //     }
    // })
</script>
</body>

</html>