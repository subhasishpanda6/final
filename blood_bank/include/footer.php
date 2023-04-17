<?php 
// if(!defined("PAGE_ACCESS")){
//    echo "<script> window.location.href = './' ;</script>";
// } 
?>
<!-- ======= Footer ======= -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/js/jquery-min.js"></script>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<!-- <script src="assets/js/response.js"></script> -->
<script src="assets/js/main.js"></script>
<script src="assets/js/script.js"></script>
<?php 
       
        if(isset($_SESSION['page'])){
            echo "<script>window.location.replace('{$_SESSION['page']}')</script>";
            unset($_SESSION['page']);
        }
    ?>
<script>
$(document).ready(function() {
    $(".reject_button").click(function() {
        if (confirm("are you sure")) {
            var value = $(this).attr("data-donation_id"); 
            
            $.ajax({
                url: "update_status.php",
                type: "POST",
                data: {
                    reason: "reject",
                    donation_id: value
                },
                success: function(e) {
                    location.reload();
                }
            });

        }
    });
    $(".d-accept").click(function() {
        if (confirm("are you sure")) {
            var value = $(this).attr("data-donation_id");
            $.ajax({
                url: "update_status.php",
                type: "POST",
                data: {
                    reason: "accept",
                    donation_id: value
                },
                success: function(e) {
                    location.reload();
                }
            });
 
        }
    });
    
    // need blood
    $(".r-accept").click(function() {
        if (confirm("are you sure")) {
            var value = $(this).attr("data-request_id");
            var bgVal = $(this).attr("data-bg");
            var bbVal = $(this).attr("data-bb");
            var unitVal = $(this).attr("data-unit");
            $.ajax({
                url: "update_status.php",
                type: "POST",
                data: {
                    status: "accept",
                    for:'need_blood',
                    request_id: value,
                    bg:bgVal,
                    bb:bbVal,
                    unit:unitVal
                },
                success: function(e) {
                  
                  if(e === "insufficent"){
                        warnMsg("insufficent blood");
                    }else{
                        success("Request accepted");
                        location.reload();
                    }
                // console.log(e);
                }
            });

        }
    });
    $(".r-reject").click(function() {
        if (confirm("are you sure")) {
            var value = $(this).attr("data-request_id");
           
            $.ajax({
                url: "update_status.php",
                type: "POST",
                data: {
                    status: "reject",
                    for:'need_blood',
                    request_id: value
                   
                },
                success: function(e) {
                    location.reload();
                    
                }
            });

        }
    });
    $(".donated").click(function() {
        if (confirm("are you sure")) {
            var value = $(this).attr("data-did"); 
            
            $.ajax({
                url: "update_status.php",
                type: "POST",
                data: {
                    reason: "donated", 
                    donation_id: value
                },
                success: function(e) {
                    location.reload();
                  
                }
            });

        }
    });
    $(".not_donated").click(function() {
        if (confirm("are you sure")) {
            var value = $(this).attr("data-did"); 
            
            $.ajax({
                url: "update_status.php",
                type: "POST",
                data: {
                    reason: "not_donated",
                    donation_id: value
                },
                success: function(e) {
                    location.reload();
                }
            });

        }
    });
});


// setInterval(function(){
//     $("#stock").load("component/stock.php");
// },1);


if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>

</html>