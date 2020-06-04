<?php
include('header.php');
include('navigation.php');
?>


<?php
if ($isShs == 'college') {
    include('Students/_sectionoffer.php');
} else {
    include('Students/_shsoffer.php');
}
?>

<?php
include('footer.php');
?>