<?php
require 'header.php';
?>
<div class="detail-main">
    <div class="side">

    </div>
    <div class="middle">
        <div class="add-cache" >
            <form action="controllers/create-cachecontroller.php" method="post">
                <input type="hidden" name="type" value="createcache">
                <div class="form-group">
                    <label for="cachename">Cache Naam</label>
                    <input type="text" name="cachename" id="cachename">

                    <label for="description">Omschrijving</label>
                    <input type="text" name="description" id="description">

                    <label for="coordinateX">Breedtegraad</label>
                    <input type="text" name="coordinateX" id="coordinateX">

                    <label for="coordinateY">Lengtegraad</label>
                    <input type="text" name="coordinateY" id="coordinateY">

                    <label for="difficulty">Moeilijkheid</label>
                    <input type="text" name="difficulty" id="difficulty">

                    <label for="rating">Rating</label>
                    <input type="text" name="rating" id="rating">

                    <label for="properties">Eigenschappen</label>
                    <input type="text" name="properties" id="properties">

                    <label for="tip">Tips</label>
                    <input type="text" name="tip" id="tip">
                </div>

                <input type="submit" value="Add Cache">
            </form>
        </div>
    </div>
    <div class="side">

    </div>
</div>
<?php
require 'footer.php';
?>