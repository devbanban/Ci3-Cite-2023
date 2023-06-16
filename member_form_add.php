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

<form  action="<?=site_url('crud/adddata');?>" method="post">
 

<h5>name</h5>
<input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />
<span class="fontred"><?php echo form_error('name'); ?></span>

<h5>lastname</h5>
<input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" size="50" />
<span class="fontred"><?php echo form_error('lastname'); ?></span>
 

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>