<?php include('header.php');
include('/opt/lampp/htdocs/training/cedhosting/web/Dbconnection.php');
include('/opt/lampp/htdocs/training/cedhosting/web/User.php');
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  echo $id;
  $User=new User();
  $Dbcon=new Dbconnection();
  
  $sql=$User->deleteproducts($id,$Dbcon->conn);
  
  echo "deleted";
}

?>
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
                    <!-- <th scope="col" class="sort" data-sort="id">Product ID</th> -->
                    <th scope="col" class="sort" data-sort="budget">Product Parent Name</th>
                    <th scope="col" class="sort" data-sort="status">Link</th>
                   
                    <th scope="col" class="sort" data-sort="completion">Product Availability</th>
                    <th scope="col" class="sort" data-sort="completion">Product Launch Date</th>
                    <th scope="col" class="sort" data-sort="completion">Webspaces</th>
                    <th scope="col" class="sort" data-sort="completion">Annual Price</th>
                    <th scope="col" class="sort" data-sort="completion">SKU</th>
                    <th scope="col" class="sort" data-sort="completion">Web Spaces</th>
                    <th scope="col" class="sort" data-sort="completion">Bandwidth</th>
                    <th scope="col" class="sort" data-sort="completion">Free Domain</th>
                    <th scope="col" class="sort" data-sort="completion">Language</th>
                    <th scope="col">MAILBOX</th>
                    <th scope="col"class="sort" data-sort="completion">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                 

                <?php 

             
                
                $User=new User();
                $Dbcon=new Dbconnection();
                $sql1=$User->tableview($Dbcon->conn);
                // print_r($sql1['annual_price']);
                foreach($sql1 as $key)
                // echo $key['annual_price'];
                {?>





                  <tr>
                   
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status"><?php echo $key['prod_name']; ?></span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <?php echo $key['html']; ?>
                       
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
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">

                       
                        <a href="editproductcategory.php?action=1&id=<?php echo  $key['id'];?>" class="showtable">Edit</a>
                        <a onclick="javascript: return confirm('are you sure?');" href="ViewProducts.php?id=<?php echo  $key['id'];?>" class="showtable">Delete</a>
                        </span>
                        <div>
                          
                        </div>
                      </div>
                    </td>
                    
                 
                    
                 
                
              
<?php }
              
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