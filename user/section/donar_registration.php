<div class="col-12 col-lg-3 col-md-4 col-sm-6 ">
    <?php if (isset($_SESSION['patient_id'])) { ?>
        <a href="blood-bank/donar_register.php" class="blood-bank-item donar">Become A Donar</a>
    <?php } else { ?>
        <a href="../login.php" class="blood-bank-item donar">Become A Donar</a>
    <?php } ?>
</div>