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
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $User=new User();
  $Dbcon=new Dbconnection();
  
  $sql=$User->deleteproducts($id,$Dbcon->conn);
  
  echo "deleted";
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
                        <div class="invalid-feedback">
                          invalid
                        </div>
                        <!-- <p id="a"></p> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Page url</label>
                        <input type="text" id="input-first-name" class="form-control" placeholder="url" name="url">
                        <div class="invalid-feedback">
                          invalid
                        </div>
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
                        <input id="input-address" class="form-control" placeholder="Enter Monthly Price" type="text" name="price" max-length="15">
                        <div class="invalid-feedback">
                          invalid
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Enter Annual Price</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Enter Annual Price" name="annualprice">
                        <div class="invalid-feedback">
                          invalid
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">SKU</label>
                        <input type="text" id="input-country" class="form-control" placeholder="SKU" name="sku">
                        <div class="invalid-feedback">
                          invalid
                        </div>
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
                        <label class="form-control-label" for="inputemail">Bandwidth</label>
                        <input type="text" id="inputemail" class="form-control" placeholder="Bandwidth" name="bandwidth">
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
                      
                  <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     

<script>
$(document).ready(function(){
    $('#input-email').on('blur',function(){
      var input=$(this);
      var z=$(this).val();
     var kk= z.length;
      var z1= z.trim();
      if(z1.length==kk)
      {
        $('#input-email').addClass('is-valid');
        $('#input-email').removeClass('is-invalid');
      }
      else{
        $('#input-email').addClass('is-invalid');
        $('#input-email').removeClass('is-valid');
      }
      var input=$(this).val;
      var re=/^\w+$/;
      var reh=/^[0-9]*$/;
      
      
      var k=re.test(input.val());
      var k1=reh.test(input.val());
      if((k)===(!k1))
      {
//
        // alert("correct");
        $('#input-email').addClass('is-valid');
        $('#input-email').removeClass('is-invalid');
      }
      else{
        // alert("incorrect");
        $('#input-email').addClass('is-invalid');
        $('#input-email').removeClass('is-valid');
        
      }
    });

    $('#input-address').on('blur',function(){
      var input=$(this);
      var z=$(this).val();
     var kk= z.length;
      var z1= z.trim();
      if(z1.length==kk)
      {
        $('#input-address').addClass('is-valid');
        $('#input-address').removeClass('is-invalid');
      }
      else{
        $('#input-address').addClass('is-invalid');
        $('#input-address').removeClass('is-valid');
      }
      // var re=/^\s*-?[0-9]{1,15}\s*$/;
      var rhe=/[0-9]+(\.[0-9]+)?$/;
      
      // var k=re.test(input.val());
      var k1=rhe.test(input.val());
      if(k1)
      {
       if(kk<=15){
        if(z1.length==kk){
        // alert("correct");
        $('#input-address').addClass('is-valid');
        $('#input-address').removeClass('is-invalid');
        }
        else{
          $('#input-address').addClass('is-invalid');
        $('#input-address').removeClass('is-valid');
        }
       }
       else{
        $('#input-address').addClass('is-invalid');
        $('#input-address').removeClass('is-valid');
       }
      }
      else{
        // alert("incorrect");
        $('#input-address').addClass('is-invalid');
        $('#input-address').removeClass('is-valid');
        
      }
    });  
    $('#input-city').on('blur',function(){
      var input=$(this);
      var z=$(this).val();
     var kk= z.length;
      var z1= z.trim();
      if(z1.length==kk)
      {
        $('#input-city').addClass('is-valid');
        $('#input-city').removeClass('is-invalid');
      }
      else{
        $('#input-city').addClass('is-invalid');
        $('#input-city').removeClass('is-valid');
      }
      // var re=/^\s*-?[0-9]{1,15}\s*$/;
      var rhe=/[0-9]+(\.[0-9]+)?$/;
      
      // var k=re.test(input.val());
      var k1=rhe.test(input.val());
      if(k1)
      {
       if(kk<=15){
        if(z1.length==kk){
        // alert("correct");
        $('#input-city').addClass('is-valid');
        $('#input-city').removeClass('is-invalid');
        }
        else{
          $('#input-city').addClass('is-invalid');
        $('#input-city').removeClass('is-valid');
        }
       }
       else{
        $('#input-city').addClass('is-invalid');
        $('#input-city').removeClass('is-valid');
       }
      }
      else{
        // alert("incorrect");
        $('#input-city').addClass('is-invalid');
        $('#input-city').removeClass('is-valid');
        
      }
    });

//     $('#input-country').on('blur',function(){
//       var input=$(this).val;
//     // 
//       var len=input.length;
//       for(i=0;i<(len);i++)
//       {
//         // var s1=s.charAt(i);
//         // var s2=s.charAt(i+1);
//         var a=input.charCodeAt(0);
//           console.log(a);
       
//         if((a>=65&&a<=90)||(a=='45'||a=='35'))
//         {
//           $('#input-country').addClass('is-valid');
//         $('#input-country').removeClass('is-invalid');
//         }
//         else
//         {
//           $('#input-country').addClass('is-invalid');
//           $('#input-country').removeClass('is-valid');
//         }

//       }

// });
$('#input-username').on('blur',function(){
      var input=$(this);
      var z=$(this).val();
     var kk= z.length;
      var z1= z.trim();
      if(z1.length==kk)
      {
        $('#input-username').addClass('is-valid');
        $('#input-username').removeClass('is-invalid');
      }
      else{
        $('#input-username').addClass('is-invalid');
        $('#input-username').removeClass('is-valid');
      }
      // var re=/^\s*-?[0-9]{1,15}\s*$/;
      var rhe=/[0-9]+(\.[0-9]+)?$/;
      
      // var k=re.test(input.val());
      var k1=rhe.test(input.val());
      if(k1)
      {
       if(kk<=5){
        if(z1.length==kk){
        // alert("correct");
        $('#input-username').addClass('is-valid');
        $('#input-username').removeClass('is-invalid');
        }
        else{
          $('#input-username').addClass('is-invalid');
        $('#input-username').removeClass('is-valid');
        }
       }
       else{
        $('#input-username').addClass('is-invalid');
        $('#input-username').removeClass('is-valid');
       }
      }
      else{
        // alert("incorrect");
        $('#input-username').addClass('is-invalid');
        $('#input-username').removeClass('is-valid');
        
      }
    });  
    $('#inputemail').on('blur',function(){
      var input=$(this);
      var z=$(this).val();
     var kk= z.length;
      var z1= z.trim();
      if(z1.length==kk)
      {
        $('#inputemail').addClass('is-valid');
        $('#inputemail').removeClass('is-invalid');
      }
      else{
        $('#inputemail').addClass('is-invalid');
        $('#inputemail').removeClass('is-valid');
      }
    });
    $('#input-country').on('blur',function(){
      var input=$(this);
      var z=$(this).val();
     var kk= z.length;
      var z1= z.trim();
      for(i=0;i<=(kk-1);i++)
      {
      //  var k5=input.indexOf('#');
      var z=$(this).val();
        var k4=z.charCodeAt('i');
        var k5=z.charCodeAt('i+1');
          if(k4=k5='35')
         {
      alert("aaa");
      // $('#input-country').addClass('is-invalid');
      //   $('#input-country').removeClass('is-valid');
      }
      elseif(k4=k5='45')
      {
        alert("aaa");
        $('#input-country').addClass('is-invalid');
        $('#input-country').removeClass('is-valid');
      }
      else
      {

        $('#input-country').addClass('is-valid');
        $('#input-country').removeClass('is-invalid');
      }
      }
    });
});
</script>
    
    
     
      
     
 

  
    

 
  

