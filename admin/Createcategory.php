<?php include('header.php');

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
  $pid=$_POST['pid'];
  $plink=$_POST['plink'];
  $avail=$_POST['avail'];
  
}

?>

<div class="container">
  <h2>Create Category</h2>
  <form action="Createcategory.php" method="Post">
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
    </div>
    <div class="form-group">
      <label for="pid">Product Parent Id</label>
      <input type="number" class="form-control" id="pid" placeholder="Enter Product ParentId" name="pid">
    </div>
    <div class="form-group">
      <label for="plink">Link</label>
      <input type="text" class="form-control" id="plink" placeholder="Enter Product Link" name="plink">
    </div>
    <div class="form-group">
      <label for="avail">Availability</label>
      <input type="text" class="form-control" id="avail" placeholder="Enter Product Availability" name="avail">
    </div>
    <button type="submit" name="submit" value="Create Category" class="btn btn-default">Submit</button>
  </form>
</div>
