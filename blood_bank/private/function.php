<?php
session_regenerate_id(true);

// redirect page to another page
function redirect($page){
    ?>
<script>
window.location.href = <?= $page ?>
</script>
<?php
}

?>