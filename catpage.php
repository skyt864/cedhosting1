<?php include("header.php"); 
    //   include("User.php");
    //   include('Dbconnection.php');
?>
<!---header--->

<!---header--->
<!---singleblog--->








<div class="tab-prices">
<div class="container">
<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">IN Hosting</a></li>
<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">US Hosting</a></li>
</ul>
<div id="myTabContent" class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
<div class="linux-prices">
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
// echo $id;
$User=new User();
$Dbcon=new Dbconnection();
$sql=$User->showwdata($id,$Dbcon->conn);
// print_r($sql);

foreach($sql as $key=>$value)
{
    


?>

<div class="col-md-3 linux-price">
<div class="linux-top">

<h4><?php echo $value['prod_name']?></h4>

</div>
<div class="linux-bottom">

<h5><?php echo "₹"; echo $value['mon_price'];?><span class="month">   per month</span></h5>
<h5><?php echo "₹"; echo $value['annual_price'];?><span class="month">   per month</span></h5>                              
<h6><strong><?php $b=json_decode ($value['description']);
			                        $aa=$b->C;
                              echo $aa;?></strong>    Domains</h6>
<ul>
<li><strong><?php $b=json_decode ($value['description']);
			                        $aa=$b->B;
                              echo $aa;?></strong>    Bandwidth</li>
<li><strong><?php $b=json_decode ($value['description']);
			                        $aa=$b->D;
                              echo $aa;?></strong>   Tech</li>
<li><strong><?php $b=json_decode ($value['description']);
			                        $aa=$b->E;
                              echo $aa;?></strong>  Email Accounts</li>
<!-- <li><strong>Includes </strong>Global CDN</li>
<li><strong>High Performance</strong>Servers</li> -->
<li><strong>location</strong> : <img src="images/india.png"></li>
</ul>
</div>
<a href="addtocart.php?id=<?php echo $value['id'];?>">buy now</a>
</div>
<?php }
}

?>
<div class="clearfix"></div>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
<div class="linux-prices">
<div class="col-md-3 linux-price">
<div class="linux-top us-top">
<h4>Standard</h4>
</div>
<div class="linux-bottom us-bottom">
<h5>$259 <span class="month">per month</span></h5>
<h6>Single Domain</h6>
<ul>
<li><strong>Unlimited</strong> Disk Space</li>
<li><strong>Unlimited</strong> Data Transfer</li>
<li><strong>Unlimited</strong> Email Accounts</li>
<li><strong>Includes </strong> Global CDN</li>
<li><strong>High Performance</strong> Servers</li>
<li><strong>location</strong> : <img src="images/us.png"></li>
</ul>
</div>
<a href="#" class="us-button">buy now</a>
</div>

<div class="col-md-3 linux-price">
<div class="linux-top us-top">
<h4>Business</h4>
</div>
<div class="linux-bottom us-bottom">
<h5>$539 <span class="month">per month</span></h5>
<h6>3 Domains</h6>
<ul>
<li><strong>Unlimited</strong> Disk Space</li>
<li><strong>Unlimited</strong> Data Transfer</li>
<li><strong>Unlimited</strong> Email Accounts</li>
<li><strong>Includes </strong> Global CDN</li>
<li><strong>High Performance</strong> Servers</li>
<li><strong>location</strong> : <img src="images/us.png"></li>
</ul>
</div>
<a href="#" class="us-button">buy now</a>
</div>
<div class="col-md-3 linux-price">
<div class="linux-top us-top">
<h4>Pro</h4>
</div>
<div class="linux-bottom us-bottom">
<h5>$639 <span class="month">per month</span></h5>
<h6>Unlimited Domains</h6>
<ul>
<li><strong>Unlimited</strong> Disk Space</li>
<li><strong>Unlimited</strong> Data Transfer</li>
<li><strong>Unlimited</strong> Email Accounts</li>
<li><strong>Includes </strong> Global CDN</li>
<li><strong>High Performance</strong> Servers</li>
<li><strong>location</strong> : <img src="images/us.png"></li>
</ul>
</div>
<a href="#" class="us-button">buy now</a>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- clients -->
<div class="clients">
<div class="container">
<h3>Some of our satisfied clients include...</h3>
<ul>
<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
</ul>
</div>
</div>
<!-- clients -->
<!-- Wordpress Features -->
<div class="features">
<div class="container">
<h3>Wordpress Features</h3>
<div class="features-grids">
<div class="col-md-4 features-grid">
<img src="images/f1.png">
<h4>Expert Web Design</h4>
<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
</div>
<div class="col-md-4 features-grid">
<img src="images/f2.png">
<h4>Expert Web Design</h4>
<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
</div>
<div class="col-md-4 features-grid">
<img src="images/f3.png">
<h4>Expert Web Design</h4>
<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
</div>
<div class="clearfix"></div>
</div>
<div class="features-grids">
<div class="col-md-4 features-grid">
<img src="images/f4.png">
<h4>Expert Web Design</h4>
<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
</div>
<div class="col-md-4 features-grid">
<img src="images/f5.png">
<h4>Expert Web Design</h4>
<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
</div>
<div class="col-md-4 features-grid">
<img src="images/f6.png">
<h4>Expert Web Design</h4>
<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
<!-- Wordpress Features -->
</div>
<!---footer--->
<?php include("footer.php"); ?>
<!---footer--->


</body>
</html>
