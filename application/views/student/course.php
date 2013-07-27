<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 7/27/13
 * Time: 11:46 AM
 * To change this template use File | Settings | File Templates.
 */


$year = new Years_Model();

?>

<div>
    <div id="header">
        <div>Year: <?php echo  form_dropdown('year_id', $year->get_years_dropdown(1)); ?></div>
    </div>





</div>