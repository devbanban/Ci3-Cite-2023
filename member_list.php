<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>รายการสมาชิก 
    <a href="<?=site_url('crud/adding');?>"> +สมาชิก </a>
</h3>
<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>lastname</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
         foreach($result as $row){ ?>
        <tr>
            <td><?=$i++;?></td>
            <td><?=$row->name;?></td>
            <td><?=$row->lastname;?></td>
            <td><a href="<?=site_url('crud/edit/'.$row->id);?>">แก้ไข</a></td>
            <td><a href="<?=site_url('crud/delete/'.$row->id);?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ??');">ลบ</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

    
</body>
</html>