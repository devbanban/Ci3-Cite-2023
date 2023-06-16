<html>
<head>
<title>My Form</title>

<style>
.fontred{
    color: red;
}
</style>
</head>
<body>

<?php // echo validation_errors(); ?>

<form  action="<?=site_url('crud/editdata');?>" method="post">

<h5>name</h5>
<input type="text" name="name" value="<?=$rsedit->name;?>" size="50" />
<span class="fontred"><?php echo form_error('name'); ?></span>

<h5>lastname</h5>
<input type="text" name="lastname" value="<?=$rsedit->lastname;?>" size="50" />
<span class="fontred"><?php echo form_error('lastname'); ?></span>
 
<input type="hidden" name="id" value="<?=$rsedit->id;?>">
<span class="fontred"><?php echo form_error('id'); ?></span>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>