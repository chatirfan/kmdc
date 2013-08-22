<?php $this->load->view('student/header',$header);?>
<div class="grid_12" style="padding: 15px;">
    <div class="floatleft" style="width: 25%;height:100%;">
        <?php echo $studentInfo; ?>
    </div>
    <div class="floatleft content" style="width: 50%;height:100%; background-color: #ffffff">
        <?php echo $content; ?>
    </div>
    <div class="floatleft" style="width: 25%;height:100%; background-color: #e6e6fa;">
    </div>
</div>
<?php $this->load->view('footer',$footer);?>
