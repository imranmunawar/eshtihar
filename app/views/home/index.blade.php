@extends('layouts.default')

@section('content')
<?php 
//print_r($categories[1]->name);
//exit;
?>
<div class="container spotlight">
  <div class="row">
    <div class="col-md-12 testimonial">
      <h2 class="content-heading">Spotlight ads</h2>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner testi-slider">
		  <?php
		  $p = 0; 
		  $c = count($posters);
		  $t = 0;
		  foreach($posters as $poster)
		  {
			  $p++;
			  $t++;
			  $cls = '';
			  if($t==1){$cls = 'active';}
			  if($p==1){
				echo '<div class="item '.$cls.'"><div class="testi-content">';  
			  }
			  $resources = MediaResource::where('poster_id','=', $poster->id)->take(1)->get();
		  ?>        
          	  <div class="sliddetail">
              	<img src="{{ URL::to('/'); }}/uploads/poster/<?php echo $resources[0]->upload;?>" />
              	<h2><a href="{{ URL::route('poster-detail',$poster->id) }}">
					<?php  
					if(strlen($poster->title) > 15)
					{
						echo substr($poster->title,0,15).'..';
					}else{
						echo $poster->title;
					} ?>
                    </a></h2>
                <div class="price"><strong>{{ $poster->price }}</strong></div>
              </div>
          <?php
			  if($p==6 || $c==$t){
				echo '</div></div>';
				$p=0;  
			  }
		  }
		  ?>
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