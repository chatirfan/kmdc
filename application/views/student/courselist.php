<?php
/**
 * Created by JetBrains PhpStorm.
 * User: irfan
 * Date: 7/27/13
 * Time: 1:08 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<div>
    <?php
        $html =  "";
        foreach($list as $item){
            $html .= "<table>".
                    "<tr><td>Code: </td><td>". $item['code']."</td></tr>".
                    "<tr><td>Course:: </td><td> ". $item['name']."</td></tr>".
                    "<tr><td>Department: </td><td>". $item['department']."</td></tr>".
                    "<tr><td>Description: </td><td>". $item['description']."</td></tr>".
                    "<tr><td>Year: </td><td>". $item['year']."</td></tr>".
                    "<tr><td>Section: </td><td>". $item['section']."</td></tr>".
                    "<tr><td>Detail:    </td><td>". anchor('student/courses/view/'. $item['id'] , 'click here')."</td></tr>".
                    "<table>";
        }

        echo $html;
    ?>

</div>