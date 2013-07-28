<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 7/27/13
 * Time: 1:08 PM
 * To change this template use File | Settings | File Templates.
 */

echo "Course List";

?>

<div>
    <?php
        $html =  "";
        foreach($list as $item){
            $html.= "<div> ".
                    "Code: ". $item['code'].
                    "<br/>Course: ". $item['name'].
                    "<br/>Department: ". $item['department'].
                    "<br/>Description: ". $item['description'].
                    "<br/>Year: ". $item['year'].
                    "<br/>Section: ". $item['section'].
                "</div><br/>";
        }

        echo $html;
    ?>

</div>