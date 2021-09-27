<?php
include("../includes/connection.php");
$cateid=$_POST['cateid'];
if(!empty($cateid)){
	
   $sql = "SELECT * FROM subcat WHERE catid=$cateid";
$result= mysqli_query($conn,$sql);
$fetchsubcat= mysqli_num_rows($result);

if($fetchsubcat> 0){
?>
	<div class="form-group" id="subcatdiv">
                    <label for="subCatId"> Subcategory Title</label>
                    <select class="form-control" id="subCatId" name="subCatId" >
					<?php
					while($row=mysqli_fetch_array($result)){
						?>
						<option value="<?php echo $row['id'];?>"><?php echo $row['title']?></option>
						<?php
					}
					?>
					</select>
					</div>
        <?php
      }else{
        ?>
               <div class="form-group" id="subcatdiv">
                    <label >Sub Category Title</label>
                    <input type="text" name="subCatId" class="form-control" disabled placeholder="please select your category">
                  </div>
         <?php
		 }

        }
       else{
     ?>
	 <div class="form-group" id="subcatdiv">
                    <label >Sub Category Title</label>
                    <input type="text" name="subCatId" class="form-control" disabled placeholder="please select your category">
                  </div>
	   <?php
	   }
	   ?>
	 
