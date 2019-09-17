<?php
require 'header.php';
require 'DBController.php';
$db_handle = new DBController();
$ratingResult = $db_handle->runQuery("SELECT DISTINCT rating FROM caches ORDER BY cachename ASC");
?>
    <div class="detail-main">
        <div class="side">

        </div>
        <div class="middle">
            <form method="POST" name="search" action="cache-list-test.php">
                        <select id="Place" name="rating[]" multiple="multiple">
                            <option value="0" selected="selected">Select Cache</option>
                            <?php
                            if (! empty($ratingResult)) {
                                foreach ($ratingResult as $key => $value) {
                                    echo '<option value="' . $ratingResult[$key]['rating'] . '">' . $ratingResult[$key]['rating'] . '</option>';
                                }
                            }
                            ?>
                        </select><br> <br>
                        <button id="Filter">Search</button>
                    </div>

                    <?php
                    if (! empty($_POST['rating'])) {
                    ?>
                    <table cellpadding="10" cellspacing="1">

                        <thead>
                        <tr>
                            <th><strong>Cachename</strong></th>
                            <th><strong>Description</strong></th>
                            <th><strong>Rating</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * from caches";
                        $i = 0;
                        $selectedOptionCount = count($_POST['rating']);
                        $selectedOption = "";
                        while ($i < $selectedOptionCount) {
                            $selectedOption = $selectedOption . "'" . $_POST['rating'][$i] . "'";
                            if ($i < $selectedOptionCount - 1) {
                                $selectedOption = $selectedOption . ", ";
                            }

                            $i ++;
                        }
                        $query = $query . " WHERE rating in (" . $selectedOption . ")";

                        $result = $db_handle->runQuery($query);
                        }
                        if (! empty($result)) {
                        foreach ($result as $key => $value) {
                            ?>
                            <tr>
                                <td><div class="col" id="user_data_1"><?php echo $result[$key]['cachename']; ?></div></td>
                                <td><div class="col" id="user_data_2"><?php echo $result[$key]['description']; ?> </div></td>
                                <td><div class="col" id="user_data_3"><?php echo $result[$key]['rating']; ?> </div></td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
                <?php
                }
                ?>
                <div class="side">

                </div>
    </div>
</main>


<?php require 'footer.php';
