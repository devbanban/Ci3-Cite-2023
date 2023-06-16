<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h3>รายการสมาชิก 
    <a href="<?=site_url('crudupload/add');?>"> +ข้อมูล </a>
</h3>
<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>img</th>
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
            <td><img src="<?=base_url('assets/pic/'.$row->img);?>" width="100px"></td>
            <td><a href="<?=site_url('crudupload/edit/'.$row->id);?>">แก้ไข</a></td>
            <td><a href="<?=site_url('crudupload/delete/'.$row->id);?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ??');">ลบ</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
        
    
    </body>
</html>