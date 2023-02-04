<?php
    if(!empty($_SESSION["alert-danger"])){?>
    <div class="mb-3 row">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION["alert-danger"];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php unset($_SESSION["alert-danger"]);
} ?>