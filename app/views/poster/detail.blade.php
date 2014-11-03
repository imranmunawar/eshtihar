@extends('layouts.default')

@section('content')
<?php
$images = MediaResource::where('poster_id','=', $id)->get();
$city = City::where('id','=', $poster[0]->city_id)->take(1)->get();
$amount = $poster[0]->price;
$formatter = new NumberFormatter('pk_PK',  NumberFormatter::CURRENCY);
//$currencies['PKR'] = array(2,'.',',');
$user = '';
if($poster[0]->user_id!=0){
	$user = City::where('id','=', $poster[0]->user_id)->take(1)->get();
}
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="row profile-popover">
        
        <div class="col-md-2 popover-left">
            <div class="user-info">
              
              <div class="price-num">{{ $formatter->formatCurrency($amount, 'PKR'), PHP_EOL; }}</div>
              <div class="contact-num"><input type="submit" value="{{ ($poster[0]->seller_phone!='')?$poster[0]->seller_phone:'' }}"></div>
	          <?php if($user!=''){ ?>  
              	<img src="{{ URL::to('/'); }}/img/no-img.jpg">
              <?php }else{?>
			  	<img src="{{ URL::to('/'); }}/img/no-img.jpg">
			  <?php }?>
              <h2>{{ $poster[0]->seller_name }}</h2>
              <div class="user-age">{{ ($user!='')?'Member Since date':'' }}</div>
              <div class="cb"></div>
              <div class="message-box">
			  {{ Form::open(array('url' => 'poster/detail/'.$id.'','files'=>true,'id'=>'postmessage')) }}              
              {{ Form::hidden('pid',$id,array('id'=>'pid')) }}
              {{ Form::text('email','',array('id' => 'email', 'placeholder'=> 'EMail address...')) }}
              {{ Form::textarea('message', null, ['size'=>'20x5','id'=>'message']) }}
              <input type="submit" value="Send Message">
              {{ Form::close() }}
              </div>
              <!--<a href="#">Facebook Share</a>-->
            </div>
        </div>
        

        
        
        
        
        <div class="col-md-9 col-md-offset-1 popover-right">
          <div class="popover-image">
          	  <h2>{{ $poster[0]->title }}</h2>
              <div class="loc-date">{{ $city[0]->city_name }} | Last Updated: {{ GeneralPurpose::timeAgo($poster[0]->updated_at) }}</div>
              
              <!--<img src="{{ URL::to('/'); }}/img/popover-img-01.jpg">-->
              
<div id="slider1_container" style="position: relative; width: 720px;
        height: 480px; overflow: hidden;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 720px; height: 480px;
            overflow: hidden;">
            
            <?php
			foreach($images as $img){
			?>
            
            <div>
                <img u="image" src="{{ URL::to('/'); }}/uploads/poster/{{ $img->upload }}" />
                <img u="thumb" src="{{ URL::to('/'); }}/uploads/poster/{{ $img->upload }}" />
            </div>
            <?php
			}
			?>
        </div>
        
        <!-- Thumbnail Navigator Skin Begin -->
        <div u="thumbnavigator" class="jssort07" style="position: absolute; width: 720px; height: 100px; left: 0px; bottom: 0px; overflow: hidden; ">
            <div style=" background-color: #000; filter:alpha(opacity=30); opacity:.3; width: 100%; height:100%;"></div>
            <!-- Thumbnail Item Skin Begin -->
            <style>
                /* jssor slider thumbnail navigator skin 07 css */
                /*
                .jssort07 .p            (normal)
                .jssort07 .p:hover      (normal mouseover)
                .jssort07 .pav          (active)
                .jssort07 .pav:hover    (active mouseover)
                .jssort07 .pdn          (mousedown)
                */
                .jssort07 .i {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 99px;
                    height: 66px;
                    filter: alpha(opacity=80);
                    opacity: .8;
                }

                .jssort07 .p:hover .i, .jssort07 .pav .i {
                    filter: alpha(opacity=100);
                    opacity: 1;
                }

                .jssort07 .o {
                    position: absolute;
                    top: 0px;
                    left: 0px;
                    width: 97px;
                    height: 64px;
                    border: 1px solid #000;
                    transition: border-color .6s;
                    -moz-transition: border-color .6s;
                    -webkit-transition: border-color .6s;
                    -o-transition: border-color .6s;
                }

                * html .jssort07 .o {
                    /* ie quirks mode adjust */
                    width /**/: 99px;
                    height /**/: 66px;
                }

                .jssort07 .pav .o, .jssort07 .p:hover .o {
                    border-color: #fff;
                }

                .jssort07 .pav:hover .o {
                    border-color: #0099FF;
                }

                .jssort07 .p:hover .o {
                    transition: none;
                    -moz-transition: none;
                    -webkit-transition: none;
                    -o-transition: none;
                }
            </style>
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 99px; HEIGHT: 66px; TOP: 0; LEFT: 0;">
                    <thumbnailtemplate class="i" style="position:absolute;"></thumbnailtemplate>
                    <div class="o">
                    </div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
            <!-- Arrow Navigator Skin Begin -->
            <style>
                    /* jssor slider arrow navigator skin 11 css */
                    /*
                .jssora11l              (normal)
                .jssora11r              (normal)
                .jssora11l:hover        (normal mouseover)
                .jssora11r:hover        (normal mouseover)
                .jssora11ldn            (mousedown)
                .jssora11rdn            (mousedown)
                */
                    .jssora11l, .jssora11r, .jssora11ldn, .jssora11rdn {
                        position: absolute;
                        cursor: pointer;
                        display: block;
                        background: url(../img/a11.png) no-repeat;
                        overflow: hidden;
                    }

                    .jssora11l {
                        background-position: -11px -41px;
                    }

                    .jssora11r {
                        background-position: -71px -41px;
                    }

                    .jssora11l:hover {
                        background-position: -131px -41px;
                    }

                    .jssora11r:hover {
                        background-position: -191px -41px;
                    }

                    .jssora11ldn {
                        background-position: -251px -41px;
                    }

                    .jssora11rdn {
                        background-position: -311px -41px;
                    }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora11l" style="width: 37px; height: 37px; top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora11r" style="width: 37px; height: 37px; top: 123px; right: 8px">
            </span>
            <!-- Arrow Navigator Skin End -->
        </div>
        <!-- ThumbnailNavigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">slideshow</a>
        <!-- Trigger -->
    </div>              
              
              
              
              <div class="comm-lower-btns">
                <!--<div class="left-btns">
                  <span><a href="#" class="heart"></a>2</span>
                  <span><a href="#" class="balon"></a>2</span>
                </div>-->
                <div class="right-btns">
                  <!--<a href="#"></a>-->
                  <p>Added {{ GeneralPurpose::timeAgo($poster[0]->created_at) }}</p>
                </div>
              </div>
              <div class="cap-popover-img">
				<h2>Seller's Comments</h2>              
                <p>{{ $poster[0]->detail }}</p>
              </div>
          </div>
          
	 <!--<div class="container main-content profileprojects simlar-ad">
      <div class="row">
        <div class="col-md-12">
        <h2 class="content-heading">Featured Ads</h2>
        <div class="row type-2">
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="{{ URL::to('/'); }}/img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <div class="status-bar">
                <p><span>PKR 1,90,000 | Lahore</span></p>
                </div>
                <a href="#">More details</a>
              </div>
          </div>
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="{{ URL::to('/'); }}/img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <div class="status-bar">
                <p><span>PKR 1,90,000 | Lahore</span></p>
                </div>
                <a href="#">More details</a>
              </div>
          </div>
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="{{ URL::to('/'); }}/img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <div class="status-bar">
                <p><span>PKR 1,90,000 | Lahore</span></p>
                </div>
                <a href="#">More details</a>
              </div>
          </div>
        </div>
        
        <h2 class="content-heading similar-box">Similar Ads</h2>        
		<div class="row type-2 bottom-box">
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="{{ URL::to('/'); }}/img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title ad-title"><a href="#">The hope project</a></h2>
                <div class="status-bar">
                <p><span>PKR 1,90,000 | Lahore</span></p>
                </div>
                <a href="#">More details</a>
              </div>
          </div>
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="{{ URL::to('/'); }}/img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <div class="status-bar">
                <p><span>PKR 1,90,000 | Lahore</span></p>
                </div>
                <a href="#">More details</a>
              </div>
          </div>
          <div class="col-md-4 box-type-2">
              <a href="#"><img src="{{ URL::to('/'); }}/img/trending-01.png"></a>
              <div class="box-2-disc">
                <h2 class="box-2-title"><a href="#">The hope project</a></h2>
                <div class="status-bar">
                <p><span>PKR 1,90,000 | Lahore</span></p>
                </div>
                <a href="#">More details</a>
              </div>
          </div>
        </div>        
        
        
        </div>
      </div>
    </div>-->          
          
          
          <!--<div class="popover-comnts">
            <div class="popover-a-comnt">
              <img src="{{ URL::to('/'); }}/img/sarah-doe.jpg">
              <div class="a-comnt-text">
                <h3>Sarah Johns</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
              <span>Added 2 hours ago</span>
              </div>
              <div class="cb"></div>
            </div>
            <div class="popover-a-comnt">
              <img src="{{ URL::to('/'); }}/img/sarah-doe.jpg">
              <div class="a-comnt-text">
                <h3>Sarah Johns</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
              <span>Added 2 hours ago</span>
              </div>
              <div class="cb"></div>
            </div>
            <div class="type-send-msg">
                  <form>
                    <input type="text" placeholder="Add your comment">
                    <button>Submit</button>
                    
                  </form>
            </div>
          </div>-->
        </div>

      </div>
    </div>
  </div>
</div>
@stop