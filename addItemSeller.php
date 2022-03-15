<!--VIEW PAGE-->



<!--Header for sellers-->
<?php
include_once 'headerSeller.php';
?>

<!--Content of the index page-->


<form action="validationFormAddItemSeller.php" method="post" enctype="multipart/form-data">     <!--enctype to upload the images-->
<div class="container-fluid">
    <div class="row justify-content-center text-center">        <!--Column centered in the page-->
        <div class="col-md-4">

        <!--Form to fill the informations to add an item for a Seller : title/description/category...-->
            <h2>Add an Item</h2>
            <h5>Please fill in all information</h5>
            <br>
            <label>Title</label>
            <input type="text" class="form-control" name="title">
            <?php if(isset($titleErr)) {?>
            <span style="color:crimson;"><?php echo $titleErr ?></span>     <!--Error for the title-->
            <?php }?>

            <br><br>

            <label>Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
            <?php if(isset($descriptionErr)) {?>
            <span style="color:crimson;"> <?php echo $descriptionErr ?></span>      <!--Error for the description-->
            <?php }?>

            <br><br>

            <label>Category</label>
            <select class="form-select" name="category">
                <option value="1">Monocristallin</option>
                <option value="2">Polycristallin</option>
            </select>
            <?php if(isset($categoryErr)) {?>
            <span style="color:crimson;"> <?php echo $categoryErr ?></span>     <!--Error for the category-->
            <?php }?>

            <br><br>

            <label class="py-3">Choose at least one image</label>       <!--upload at least one image-->
            <div class="form-group">
                <label for="image1">Image #1</label>
                <input type="file" class="form-control-file" name="image1" id="image1">
            </div>
            <br>
            <div class="form-group">
                <label for="image2">Image #2</label>
                <input type="file" class="form-control-file" name="image2" id="image2">
            </div>
            <br>
            <div class="form-group">
                <label for="image3">Image #3</label>
                <input type="file" class="form-control-file" name="image3" id="image3">
            </div>
            <?php if(isset($imageErr)) {?>
            <span style="color:crimson;"> <?php echo $imageErr ?></span>        <!--Error for the images-->
            <?php }?>

            <br><br>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <label>Purchase Category</label>                                         <!--Purchase Category choice-->
        <div class="col-md-3">
            <div class="card bg-success bg-gradient">
                <div class="form-check my-3">       <!--Section for Buy it now-->
                    <input class="form-check-input" type="checkbox" name="buyItNow" onclick="toggleTextbox(this)" id="bin">     <!--toggle the textbox to fill the price-->
                    <label class="form-check-label h5 " for="bin">   
                        Buy It Now
                    </label>
                </div>
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <i class="fas fa-pound-sign h4 my-1" id="pound" style="display:none;"></i>
                    <input type="text" class="form-control w-50 my-1 mx-2" name="price" id="binText" placeholder="Set up your price" style="display:none;">
                </div>
                <?php if(isset($priceErr)) {?>
                <span style="color:crimson;"> <?php echo $priceErr ?></span>        <!--Error for the price-->
                <?php }?>
            </div>
        </div>
        
        <?php if(isset($success)) {?>
        <span style="color:lime;"> <?php echo $success ?></span>        <!--message for success-->
        <?php }?>
    </div>
    <br><br>

    <div class="row justify-content-center text-center">
        <div class="col-md-3">
            <input type="submit" class="btn btn-primary" value="Add">       <!--Submit to the controller-->
            <input type="reset" class="btn btn-secondary" value="Reset">
        </div>
    </div>
</div>
</form>


<script type="text/javascript">
//function toggle for buy it now
    function toggleTextbox()
    {
        var check = document.getElementById('bin');
        if (check.checked) {
            document.getElementById('binText').style.display = 'block';
            document.getElementById('pound').style.display = 'block';
        }
        else{
            document.getElementById('binText').style.display = 'none'; 
            document.getElementById('pound').style.display = 'none';
        }
    }

</script>
      
<!--Footer-->
<?php
include_once 'footer.php';
?>
