<?php include_once "tags/page-meta.php" ?>
<script>

</script>
<body>
<!-- navbar -->
<?php include_once "tags/home-tag.php"; ?>
<div class="contact-form" id="contact">
    <div class="container">
        <div class="row"> 
            <div class="col-4">
                    <div id="userImage"><img src='controllers/currentUserAvatarController.php' class="img-fluid" alt="Responsive image"></div>
                    <input type="file" id="fileChooser" style="display:none;" name="data" accept="image/x-png,image/gif,image/jpeg">
            </div> 
            <div class="col-8 text-left">
                    <?php echo '<h1>' . $userInfo['firstname'] . " " . $userInfo['secondname'] . '</h1>'?>
                    <?php echo '<h2> email: ' . $userInfo['email'] . '</h2>'?>
                    <?php echo '<h2>' . $userInfo['role'] . '</h2>'?>
            </div>
        </div> 
    </div>
</div>
<!-- add Javasscript file from js file -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>