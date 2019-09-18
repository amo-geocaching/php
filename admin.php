<?php
require 'header.php';
?>
<div class="detail-main">
    <div class="side">

    </div>
    <div class="middle">
        <div class="main-form" >
            <form action="controllers/create-cachecontroller.php" class="login-register" method="post">
                <input type="hidden" name="type" value="createcache">
                <div class="form-groups">
                    <div class="form-group">
                        <label for="cachename">Cache Naam:</label>
                        <input type="text" name="cachename" id="cachename">
                    </div>
                    <div class="form-group">
                        <label for="description">Omschrijving:</label>
                        <input type="text" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="coordinateX">Breedtegraad:</label>
                        <input type="text" name="coordinateX" id="coordinateX">
                    </div>
                    <div class="form-group">
                        <label for="coordinateY">Lengtegraad:</label>
                        <input type="text" name="coordinateY" id="coordinateY">
                    </div>
                    <div class="form-group">
                        <label for="difficulty">Moeilijkheid:</label>
                        <input type="text" name="difficulty" id="difficulty">
                    </div>
                    <div class="form-group">
                        <label for="properties">Eigenschappen:</label>
                        <input type="text" name="properties" id="properties">
                    </div>
                    <div class="form-group">
                        <label for="tip">Tips:</label>
                        <input type="text" name="tip" id="tip">
                    </div>
                </div>

                <input class="add-cache-button" type="submit" value="Add Cache">
            </form>
        </div>
    </div>
    <div class="side">

    </div>
</div>
<?php
require 'footer.php';
?>