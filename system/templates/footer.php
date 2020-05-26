<footer class="bg-dark text-white py-5">
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-3">
                <img style="width: 30%;" src="/img/mpclogo.png" alt="">
                <hr class="light" />
                <P>555-555-555</P>
                <P>mpc@monterssori.com</P>
                <P>100 steet Name</P>
                <P>Imus, Cavite</P>
            </div>
            <div class="col-md-6">
                <h4>Contact Us</h4>
                <form class="">
                    <div class="col">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary btn-lg" type="button">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <hr class="light" />
                <h5>Office Hours</h5>
                <hr class="light" />
                <P>Monday: 9am- 5pm</P>
                <P>Saturday: 10am - 4pm</P>
                <P>Sunday: Close</P>
            </div>

        </div>
    </div>
</footer>
<div class="text-center bg-dark text-white py-2">
    <p>&copy;Copyrights 2020, Created By Lovely Thesis Group</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="./js/app.js">
</script>
<script>
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
            $('#buttonConfirm').removeAttr('disabled');
        } else {
            $('#message').html('Not Matching').css('color', 'red');
            input.attr("disabled");
        }

        if (('#password').text().length > 5) {
            $('#message2').html('Password Okay').css('color', 'green');
        } else {
            $('#message2').html('Password not Enough').css('color', 'red');
        }

    });
</script>
</body>

</html>