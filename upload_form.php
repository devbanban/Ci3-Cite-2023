<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<form action="<?=site_url('crudupload/add_db');?>" method="post" enctype="multipart/form-data" >

<h5>name</h5>
<input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />
<span class="fontred"><?php echo form_error('name'); ?></span>


<br> <br />

<input type="file" name="img" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>