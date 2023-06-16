<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- sweet alert js & css -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="mt-3">CodeIgniter3 Workshop : Insert, Update & Delete Multiple Rows
                    <a href="<?=site_url('multiples/formAddd/');?>" class="btn btn-primary"> +Data</a>
                </h2>
                <?php echo validation_errors(); ?>
                <form action="<?=site_url('multiples/checking');?>" method="post">
                <table class="table table-hover table-strip table-bordered table-sm">
                    <thead class="table-info">
                        <tr>
                            <th width="5%" class="text-center">#</th>
                            <th width="85%">Name</th>
                            <th width="5%" class="text-center">
                                <button type="submit" class="btn btn-warning btn-sm" name="act" value="edit">แก้ไข</button></th>
                            <th width="5%"><center>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล');" name="act" value="del">ลบ</button></center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($query as $row){ ?>
                           
                        <tr>
                            <td align="center"><?=$row->id;?></td>
                            <td><?=$row->name;?></td>
                            <td align="center"><input type="checkbox" name="id[<?=$row->id;?>]" value="<?=$row->id;?>" autocomplete="off"></td>
                            <td align="center"><input type="checkbox" name="id[<?=$row->id;?>]" value="<?=$row->id;?>" autocomplete="off"></td>
                        </tr>
                        
                        
                        <?php } ?>
                       <!--  <tr>
                            <td colspan="2"></td>
                            <td><button type="submit" class="btn btn-warning" >แก้ไข</button></td>
                            <td align="center"><button type="submit" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล');">ลบ</button></td>
                        </tr> -->
                        
                      
                        
                    </tbody>

                </table>
                
                            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>