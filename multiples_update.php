<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Form Update</h1>
                <?php echo validation_errors(); ?>
                <form method="post" action="<?=site_url('multiples/updateData');?>">
                    <?php foreach ($rsedit as $row) { ?>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name id : <?=$row->id;?></label>
                        <div class="col-sm-5">
                            <input type="test" name="name[<?=$row->id;?>]" class="form-control" required placeholder="ชื่อ-สกุล" value="<?=$row->name;?>">
                          
                        </div>
                    </div>
                <?php } ?>

                   

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </div>
                     
                   
                     
                    
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>