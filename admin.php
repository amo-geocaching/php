<?php
require 'header.php';
?>
    <div class="container" >
        <div class="add-cache" >
            <form action="controllers/create-cachecontroller.php" method="post">
                <input type="hidden" name="type" value="createcache">
                <div class="form-group">
                    <label for="cachename">Cache Name</label>
                    <input type="text" name="cachename" id="cachename">

                    <label for="description">Description</label>
                    <input type="text" name="description" id="description">

                    <label for="coordinateX">Coordinate-X</label>
                    <input type="text" name="coordinateX" id="coordinateX">

                    <label for="coordinateY">Coordinate-Y</label>
                    <input type="text" name="coordinateY" id="coordinateY">

                    <label for="difficulty">Difficulty</label>
                    <input type="text" name="difficulty" id="difficulty">

                    <label for="rating">Rating</label>
                    <input type="text" name="rating" id="rating">

                    <label for="properties">Properties</label>
                    <input type="text" name="properties" id="properties">

                    <label for="tip">tip</label>
                    <input type="text" name="tip" id="tip">
                </div>

                <input type="submit" value="Add Cache">
            </form>
        </div>
    </div>
<?php
require 'footer.php';
?>