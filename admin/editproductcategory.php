<?php include('header.php');
include('/opt/lampp/htdocs/training/cedhosting/web/Dbconnection.php');
include('/opt/lampp/htdocs/training/cedhosting/web/User.php');

$id = isset($_GET['id'])?$_GET['id']:'';
echo $id;
$User=new User();
$Dbcon=new Dbconnection();
$sql=$User->editproducts($id,$Dbcon->conn);
// print_r($sql);
foreach($sql as $key)
{

    $category=$key['prod_name'];
    
    // echo $category;
    $url=$key['html'];
    $b=json_decode ($key['description']);
    $a=$b->A;
    $bb=$b->B;
    $c=$b->C;
    $d=$b->D;
    $e=$b->E;
    $month=$key['mon_price'];
    $annual=$key['annual_price'];
    $sku=$key['sku'];

   
}
?>

<?php
if(isset($_POST['update']))
{
    //echo "aaa";
    $valuee=$_POST['parentid'];
    echo "dhfjdf".$valuee."sdshgdfh";
    $id=$_POST['id'];
   
    // $category=$_POST['prod_parent_id'];
    // echo $category;
    $name=$_POST['name'];
//  echo $name;
    $url=$_POST['url'];
    // echo $url;
    
    // $sql=$User->addproduct($category,$name,$url,$Dbcon->conn);
    // $sql=$User->navHost($Dbcon->conn);
    // echo "product added";
   
    $price=$_POST['price'];
    // echo $price;
    $annualprice=$_POST['annualprice'];
    // echo $annualprice;
    $sku=$_POST['sku'];
    // echo $sku;
    $web=$_POST['web'];
    // echo $web;
    $bandwidth=$_POST['bandwidth'];
    // echo $bandwidth;
    $freedomain=$_POST['freedomain'];
    // echo $freedomain;
    $tech=$_POST['tech'];
    // echo $tech;
    $mailbox=$_POST['mailbox'];
    // echo $mailbox;
    $User=new User();
    $Dbcon=new Dbconnection();
    $a = array("A"=>$web, "B"=>$bandwidth, "C"=>$freedomain,"D"=>$tech,"E"=>$mailbox);
    json_encode($a);
    // print_r($a);
     $sql1=$User->myupdatedproducts($id,$valuee,$name,$url,json_encode($a),$price,$annualprice,$sku,$Dbcon->conn);
}


?>
<div class="container-fluid mt-12 p-5">
      <div class="row">
        <div class="col-xl-12 order-xl-12">
          <div class="card card-profile">
            <!-- <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top"> -->
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <!-- <img src="../assets/img/theme/team-4.jpg" class="rounded-circle"> -->
                  </a>
                </div>
              </div>
            </div>
            
              
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"> </h3>
                </div>
                <div class="col-4 text-right">
                  <!-- <a href="#!" class="btn btn-sm btn-primary">Settings</a> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              <form  action="editproductcategory.php" method="POST">
                <h6 class="heading-small text-muted mb-4">Enter Product Detail</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Select Product Category</label>
                        <select name="parentid" id="parentid" class="form-control">
                   <option value="0" selected><?php
                    $User=new User();
                    $Dbcon=new Dbconnection();
                    
                   $sql=$User->parentname($category,$Dbcon->conn);
               echo $sql;
                   ?>
                  </option>
            <?php
                        $User=new User();
                           $Dbcon=new Dbconnection();
                         $sql=$User->navHost($Dbcon->conn);
                          // print_r($sql);
                     foreach($sql as $key=>$value)
                      {
                        if($value['prod_parent_id']=='1')
                        echo ('<option value="'.$value['id'].'">'.$value['prod_name'].'</option>');
                      }
                      ?>
                    </select>
                        <!-- <input type="text" id="input-username" class="form-control" placeholder="Username" value="Select Product Category"> -->
                        <!-- <input type="text" class="form-control" id="nam" placeholder="//<!?php// echo $category; ?>" name="nam" disabled> -->
                     
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Enter Product Name</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Enter Product Name" name="name" value="<?php echo $category;  ?>" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Page url</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="url" name="url" value="<?php  echo $url ;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <!-- <label class="form-control-label" for="input-last-name">Last name</label> -->
                        <!-- <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse"> -->
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Product Description(Enter Product Description Below)</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Enter Monthly Price</label>
                        <input id="input-address" class="form-control" placeholder="Enter Monthly Price" type="text" name="price" value="<?php echo $month;?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Enter Annual Price</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Enter Annual Price" name="annualprice"value="<?php echo $annual;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">SKU</label>
                        <input type="text" id="input-country" class="form-control" placeholder="SKU" name="sku" value="<?php echo $sku;?>">
                      </div>
                    </div>
      
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4 ml-4">FEATURES</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Web Spaces(in GB)</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Web Spaces(in GB)" name="web" value="<?php echo $a;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Bandwidth</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Bandwidth" name="bandwidth" value="<?php echo $bb;?>">
                      </div>
                    </div>
                  </div>
                  <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Free Domain</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Free Domain" name="freedomain" value="<?php echo $c;?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Language/Technology Support</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Language/Technology Support" name="tech" value="<?php echo $d;?>">
                      </div>
          
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">MailBox</label>
                        <input type="text" id="input-email" class="form-control" placeholder="MailBox" name="mailbox" value="<?php echo $e;?>">
                      </div>
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:'';?>"> 
                  <button type="submit" name="update" value="update" name="update" class="btn btn-default">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      


    