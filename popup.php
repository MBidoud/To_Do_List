<?php
// Example update logic
if(isset($_POST['update'])){
    // your update query here...
    
    // after successful update:
    echo "<script>alert('Updated successfully!'); window.location.href='index.php';</script>";
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php
if(isset($_POST["update"])){

    // your SQL update code here...

    echo "
    <script>
        Swal.fire({
            title: 'Success!',
            text: 'Data updated correctly.',
            icon: 'success'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
}
?>
<?php
$updated = false;

if(isset($_POST['update'])){
    // process update...
    $updated = true;
}
?>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php if($updated): ?>
<script>
Swal.fire("Updated!", "Your data has been updated.", "success");
</script>
<?php endif; ?>

<!-- Your HTML form -->
</body>
</html>
