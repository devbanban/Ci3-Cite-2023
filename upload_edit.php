<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<form action="<?=site_url('crudupload/edit_db_img');?>" method="post" enctype="multipart/form-data" >

<h5>name</h5>
<input type="text" name="name" value="<?php echo $rsedit->name; ?>" size="50" />
<span class="fontred"><?php echo form_error('name'); ?></span>


<br> <br />
ภาพเก่า <br>
<img src="<?=base_url('assets/pic/'.$rsedit->img);?>" width="100px">
<br>
เลือกภาพใหม่ <br> 

<input type="file" name="img" size="20" />

<br /><br />
<input type="hidden" name="id" value="<?=$rsedit->id;?>">
<input type="hidden" name="img2" value="<?=$rsedit->img;?>">
<input type="submit" value="upload" />

</form>

</body>
</html>