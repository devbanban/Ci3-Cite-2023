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
                <h1>Form Add data</h1>
                <?php echo validation_errors(); ?>
                <form method="post" action="<?=site_url('multiples/adddData');?>">

                    <div class="row mb-3">
                        <label class="col-sm-1 col-form-label">Name1</label>
                        <div class="col-sm-5">
                            <input type="test" name="name[]" class="form-control" required placeholder="ชื่อ-สกุล" value="<?php echo set_value('name[]'); ?>">
                          
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-1 col-form-label">Name2</label>
                        <div class="col-sm-5">
                            <input type="test" name="name[]" class="form-control" required placeholder="ชื่อ-สกุล" value="<?php echo set_value('name[]'); ?>">
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-1 col-form-label">Name3</label>
                        <div class="col-sm-5">
                        
                            <input type="test" name="name[]" class="form-control" required placeholder="ชื่อ-สกุล" value="<?php echo set_value('name[]'); ?>">
                           
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                        </div>
                    </div>
                     
                   
                     
                    
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>