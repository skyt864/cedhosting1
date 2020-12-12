<?php include('header.php') ;
include('/opt/lampp/htdocs/training/cedhosting/web/Dbconnection.php');
include('/opt/lampp/htdocs/training/cedhosting/web/User.php');
?>
<?php
if(isset($_POST['submit']))
{
  $category=$_POST['parentid'];
  // echo $category;
  $name=$_POST['name'];
  // echo $name;
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
  $sql1=$User->myproducts($category,$name,$url,json_encode($a),$price,$annualprice,$sku,$Dbcon->conn);
// echo "inserted";
}
?>
    
    <!-- Page content -->
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
              <form  action="Addproducts.php" method="POST">
                <h6 class="heading-small text-muted mb-4">Enter Product Detail</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <!-- <label class="form-control-label" for="input-username">Select Product Category</label> -->
                        
                        <!-- <input type="text" id="input-username" class="form-control" placeholder="Username" value="Select Product Category"> -->
                        <select name="parentid" id="parentid" class="form-control">
                   <option value="0" selected>Select product Category</option>
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
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Enter Product Name</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Enter Product Name" name="name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Page url</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="url" name="url">
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
                        <input id="input-address" class="form-control" placeholder="Enter Monthly Price" type="text" name="price">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Enter Annual Price</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Enter Annual Price" name="annualprice">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">SKU</label>
                        <input type="text" id="input-country" class="form-control" placeholder="SKU" name="sku">
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
                        <input type="text" id="input-username" class="form-control" placeholder="Web Spaces(in GB)" name="web">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Bandwidth</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Bandwidth" name="bandwidth">
                      </div>
                    </div>
                  </div>
                  <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Free Domain</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Free Domain" name="freedomain">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Language/Technology Support</label>
                        <input type="text" id="input-email" class="form-control" placeholder="Language/Technology Support" name="tech">
                      </div>
          
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">MailBox</label>
                        <input type="text" id="input-email" class="form-control" placeholder="MailBox" name="mailbox">
                      </div>
                    </div>
                  </div>
                      
                  <button type="submit" name="submit" value="add Product" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
     
 
  

<div class="container-fluid mt--10">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Product table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">Product Name</th>
                    <th scope="col" class="sort" data-sort="budget">Product Parent Name</th>
                    <th scope="col" class="sort" data-sort="status">Link</th>
                    <th scope="col">Link</th>
                    <th scope="col" class="sort" data-sort="completion">Product Availability</th>
                    <th scope="col" class="sort" data-sort="completion">Product Launch Date</th>
                    <th scope="col" class="sort" data-sort="completion">Webspaces</th>
                    <th scope="col" class="sort" data-sort="completion">Bandwidth</th>
                    <th scope="col" class="sort" data-sort="completion">Language support</th>
                    <th scope="col" class="sort" data-sort="completion">Free Domain</th>
                    <th scope="col" class="sort" data-sort="completion">Annual Price</th>
                    <th scope="col" class="sort" data-sort="completion">SKU</th>
                    <th scope="col" class="sort" data-sort="completion">Bandwidth</th>
                    <th scope="col"class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                 

                <?php 

                if(isset($_POST['submit']))
              {
                
                $User=new User();
                $Dbcon=new Dbconnection();
                $sql1=$User->tableview($Dbcon->conn);
                // print_r($sql1['annual_price']);
                foreach($sql1 as $key)
                // echo $key['annual_price'];
                {?>





                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo $key['id']; ?>
                        </span>
                        </div>
                      </div>
                    </th>
                   
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status"><?php echo $key['prod_name']; ?></span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['link']; ?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">

                        <?php $key['prod_available'];
                         if($key['prod_available']=='1')
                         {
                           echo "IS AVAILABLE";
                         }
                         else {
                           echo "not available";
                         }
                        
                        
                        ?>
                        </span>
                        <div>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['prod_launch_date'] ;?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['mon_price']; ?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['annual_price'] ?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['sku'] ?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="avatar-group">
                     <?php echo $key['link'] ?>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">
                     <?php   $b=json_decode ($key['description']);
			                        $a=$b->A;
                              echo $a;
                       ?>
                      </div>
                    </td> 
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">
                     <?php   $b=json_decode ($key['description']);
			                        $bb=$b->B;
                              echo $bb;
                       ?>
                      </div>
                    </td> 
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">
                     <?php   $b=json_decode ($key['description']);
			                        $c=$b->C;
                              echo $c;
                       ?>
                      </div>
                    </td> 
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">
                     <?php   $b=json_decode ($key['description']);
			                        $d=$b->D;
                              echo $d;
                       ?>
                      </div>
                    </td> 
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">
                     <?php   $b=json_decode ($key['description']);
			                        $e=$b->E;
                              echo $e;
                       ?>
                      </div>
                    </td> 
                    
                 
                    
                 
                
              
<?php }
              }
?>
</tbody>
</table>
            </div>
               





                 


      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>


        
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>