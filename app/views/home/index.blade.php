@extends('layouts.default')

@section('content')
<?php 
//print_r($categories[1]->name);
//exit;
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 testimonial">
      <h2 class="content-heading">Spotlight ads</h2>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner testi-slider">
          <div class="item active">
            <div class="testi-content">
              <img src="img/manager-01.png" width="200" height="100">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">
              <img src="img/manager-01.png">                
            </div>
          </div>

        </div>
       
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="testi-control-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="testi-control-right"></span>
        </a>
        </div>
    </div>
  </div>
</div>

<div class="container-fluid karamaShop">
      <div class="container karmaShop-inner" id="home-cats">
        <div class="row">
          <div class="col-md-12">
          <!--<h2 class="content-heading">What's on Karma Shop</h2>-->
            <div class="row">
		    <?php
            $i = 0;
			$c = 0;
			$recs = count($categories);
            foreach($categories as $k => $mainCat){
            $i++;
			$c++;
		  	if($i == 1){ echo '<div class="col-md-6"><ul>';}
            ?>            
                  <li class="box-type-3">
                    <a href="#"><img src="{{ URL::to('/'); }}/img/cats/<?php echo $mainCat->cat_img;?>"></a>
                    <div class="karma-right">
                     <h2 class="shop-box-title"><a href="{{ URL::route('category',$mainCat->id) }}"><?php echo $mainCat->category;?></a></h2>
                    <div class="author-detail">
                      <div class="author-name">
						<?php
						if(isset($mainCat['sub'])){
							foreach($mainCat['sub'] as $k => $subCat){
							?>                      
							<p><a href="{{ URL::route('category',$subCat->id) }}"><?php echo $subCat->category; ?></a></p>
							<?php
							 }
						}
                        ?>
                      </div>
                      <!--<div class="helps-likes"><span>12</span><br><small>Points</small></div>-->
                    </div>
                    <div class="cb"></div>
                    <!--<div class="post-date"><p>Posted 3 days ago</p></div>--> 
                    </div>
                    <div class="cb"></div>
                  </li>                
			  <?php
				if($i == 4 || $c == $recs){ echo '</ul></div>';$i=0;}			  
              }
              ?>                          
              
              
            </div>
          </div>
        </div>
      </div>
    </div>

@stop