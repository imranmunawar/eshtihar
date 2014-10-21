$('#ad_state').on('change', function(){
        
	var selected_state = $(this).val();
	//alert(selected_country);
	if(selected_state != '' && selected_state != 0){
		
		$.ajax({
			type: "GET",
			url: '/get-cities-of-state/'+selected_state,
			dataType: 'json',
			success: function(data){
				if(typeof(data) != 'undefined' && data.status == 'success' && data.cities != ''){
					//$('#load-cities').show();
					cities_html = '<option value="">Select City</option>';
					$.each(data.cities, function(key, value)
					{
						cities_html += '<option value="'+value.id+'">'+value.city_name+'</option>';
					}); 
					
					$('#city').html(cities_html);
					
				}
			}
		});
		
	}else{
		//alert(selected_country);
		cities_html = '';
		cities_html += '<option value="">Select City</option>';
		$('#city').html(cities_html);
	}
});
function loadSecondLevel(id){
	var fl = $('#firstlevel').val();
	if(fl!=''){
		$('#first-level-'+fl).removeClass('active');
		$('#first-level-'+id).addClass('active');			
	}else{
		$('#first-level-'+id).addClass('active');
	}
	$('#firstlevel').val(id);
	$.ajax({
		type: "GET",
		url: '/get-second-level/'+id,
		dataType: 'json',
		success: function(data){
			if(typeof(data) != 'undefined' && data.status == 'success' && data.categories != ''){
				//$('#load-cities').show();
				categories_html = '';
				$.each(data.categories, function(key, value)
				{
					categories_html += '<li id="second-level-'+value.id+'" onclick="loadThirdLevel(\''+value.id+'\');">'+value.category+'</li>';
				}); 
				$('#second-level').html('');
				$('#third-level').html('');
				$('#four-level').html('');				
				$('#second-level').html(categories_html);
				$('#load-attributes').hide();
				$('#load-attributes').html('');				
			}
		}
	});
}
function loadAttribute(id){
	$.ajax({
		type: "GET",
		url: '/poster/attributes/'+id,
		dataType: 'html',
		success: function(data){
			if(typeof(data) != 'undefined' && data != ''){
				$('#load-attributes').show();
				$('#load-attributes').html(data);
			}else{
				$('#load-attributes').hide();
				$('#load-attributes').html('');				
			}
		}
	});
}
function loadThirdLevel(id){
	var fl = $('#secondlevel').val();
	if(fl!=''){
		$('#second-level-'+fl).removeClass('active');
		$('#second-level-'+id).addClass('active');			
	}else{
		$('#second-level-'+id).addClass('active');
	}
	$('#secondlevel').val(id);	
	$.ajax({
		type: "GET",
		url: '/get-third-level/'+id,
		dataType: 'json',
		success: function(data){
			if(typeof(data) != 'undefined' && data.status == 'success' && data.categories != ''){
				//$('#load-cities').show();
				$('#second-level-'+fl).removeClass('last-active');
				categories_html = '';
				$.each(data.categories, function(key, value)
				{
					categories_html += '<li id="third-level-'+value.id+'" onclick="loadFourLevel(\''+value.id+'\');">'+value.category+'</li>';
				}); 
				$('#third-level').html('');
				$('#four-level').html('');				
				$('#third-level').html(categories_html);
				loadAttribute(id);
				
			}else{
				$('#third-level').html('');
				$('#second-level-'+fl).removeClass('active');
				$('#second-level-'+fl).removeClass('last-active');
				$('#second-level-'+id).addClass('last-active');
			}
		}
	});
}
function loadFourLevel(id){
	
	var fl = $('#thirdlevel').val();
	if(fl!=''){
		$('#third-level-'+fl).removeClass('active');
		$('#third-level-'+id).addClass('active');			
	}else{
		$('#third-level-'+id).addClass('active');
	}
	$('#thirdlevel').val(id);	
	$.ajax({
		type: "GET",
		url: '/get-four-level/'+id,
		dataType: 'json',
		success: function(data){
			if(typeof(data) != 'undefined' && data.status == 'success' && data.categories != ''){
				//$('#load-cities').show();
				categories_html = '';
				$.each(data.categories, function(key, value)
				{
					categories_html += '<li id="four-level-'+value.id+'" onclick="loadFiveLevel(\''+value.id+'\');">'+value.category+'</li>';
				}); 
				$('#four-level').html('');
				$('#four-level').html(categories_html);
				
			}else{
				$('#four-level').html('');
				$('#third-level-'+fl).removeClass('active');
				$('#third-level-'+fl).removeClass('last-active');
				$('#third-level-'+id).addClass('last-active');
			}
		}
	});		
}
function loadFiveLevel(id){
	
	var fl = $('#fourlevel').val();
	if(fl!=''){
		$('#four-level-'+fl).removeClass('last-active');
		$('#four-level-'+id).addClass('last-active');			
	}else{
		$('#four-level-'+id).addClass('last-active');
	}
	$('#fourlevel').val(id);			
}
$( document ).ready(function() {
	
	
	var upcount = 0;
	$('#postmyad #add_more').on('click', function(){
		upcount++;
		$('#postmyad').append('<input class="attachment file-'+upcount+'" id="attachment-'+upcount+'" name="file[]" type="file" />');		
		$('#postmyad #attachment-'+upcount).click();
		$('#postmyad #attachment-'+upcount).css('visibility', 'hidden');
	});
	if(upcount == 5 ){
		$('#add_more').hide();
	}else{
		$('#add_more').show();
	}
    $('body').on('change', '#postmyad .attachment', function() {
       
        if (this.files && this.files[0]) {
            files = this.files[0];
            var reader = new FileReader();
            reader.onload = previewImage;
            reader.readAsDataURL(this.files[0]);
        }
    });
		
	
// To Preview Image
    function previewImage(e) {
        
        var file_extention = e.target.result.split(",")[0].split(":")[1].split(";")[0].split("/")[1];
        //console.log(mimeType);
        if(file_extention == 'png' || file_extention == 'jpeg' || file_extention == 'jpg'){
            
            attachment_html = '<li class="file-'+upcount+' media-list-box">'+
            '<img style="height:140px; width:140px" src="'+ e.target.result +'"/>'+
            '<a class="cursor-pointer" onclick="$(\'.file-'+upcount+'\').remove();">x</a>'+
            '</li>';
        }else if(file_extention == 'pdf'){
            attachment_html = '<li class="file-'+upcount+' media-list-box">'+
            '<img style="height:140px; width:140px" src="/img/pdf-icon.jpg" title="'+$('.file-'+upcount).val()+'"/>'+
            '<a class="cursor-pointer" onclick="$(\'.file-'+upcount+'\').remove();">x</a>'+
            '</li>';
        }else{
            attachment_html = '<li class="file-'+upcount+' media-list-box">'+
            '<span>'+ $('.file-'+upcount).val() +'</span>'+
            '<a class="cursor-pointer" onclick="$(\'.file-'+upcount+'\').remove();">x</a>'+
            '</li>';
        }
        
        $('#postmyad .upload-img ul').append(attachment_html);
    };	

});

$().ready(function() {
	// validate signup form on keyup and submit
	
	$("#postmyad").validate({

	rules: {
		firstlevel:{
			required: true,
		},
		ad_title: {
			required: true,
			minlength: 5
		},
		ad_price: {
			required: true,
			minlength: 3,
			number: true
		},
		ad_text: {
			required: true,
			minlength: 50			
		},
		ad_state: {
			required: true
		},	
		city: {
			required: true
		},			
		ad_uname: {
			required: true,
			minlength: 3			
		},		
		ad_uemail: {
			required: true,
			email: true
		},
		ad_uphone: {
			required: true,
			minlength: 11,
			digits: true
		},		
	},
	messages: {
		firstlevel:{
			required: "Please Please category",
		},
		ad_title: {
			required: "Please enter a ad title",
			minlength: "Your title must consist of at least 5 characters"
		},
		ad_price: {
			required: "Please provide a ad price",
			minlength: "Your price must be at least 3 characters long",
			number: "Please enter a valid number"
		},
		ad_state: {
			required: "Please select province"
		},	
		city: {
			required: "Please select city"
		},		
		ad_text: {
			required: "Please provide description",
			minlength: "Your description must be at least 50 characters",
		},			
		ad_uname: {
			required: "Please provide a user name",
			minlength: "Your user name must be at least 3 characters long",
		},
		ad_uemail: "Please enter a valid email address",
		ad_uphone: {
			required: "Please enter phone number",
			minlength: "Your phone must be at least 11 characters long",
			digits: "Please enter a valid number"
		},
	}
	}); 
});
function checkForm(){
	var fl = $('#firstlevel').val();
	var second = $('#second-level li').hasClass('last-active');
	var third = $('#third-level li').hasClass('last-active');
	var four = $('#four-level li').hasClass('last-active');
	if(fl==''){
		$('#ad_cats_error').show();
		return false;	
	}else if(second == true || third == true || four == true){
		extraFormValidation();
		$('#ad_cats_error').hide();
		return true;
	}
	else{
		$('#ad_cats_error').show();
		return false;		
	}
}
function extraFormValidation(){
	attrHTML = $('#load-attributes').html();	
	if(attrHTML!=''){
		empty_flds = 0;
		$(".required").each(function() {
			if(!$.trim($(this).val())) {
				empty_flds++;
			}    
		 });	
		 return true;
	}else{
		return true;
	}
}
$(document).ready(function() {
	// Initialize navgoco with default options
	$("#demo1").navgoco({
		caretHtml: '',
		accordion: false,
		openClass: 'open',
		save: true,
		cookie: {
			name: 'navgoco',
			expires: false,
			path: '/'
		},
		slide: {
			duration: 400,
			easing: 'swing'
		},
		// Add Active class to clicked menu item
		onClickAfter: function(e, submenu) {
			e.preventDefault();
			$('#demo1').find('li').removeClass('active');
			var li =  $(this).parent();
			var lis = li.parents('li');	
			li.addClass('active');
			lis.addClass('active');
		},
	});

	$("#collapseAll").click(function(e) {
		e.preventDefault();
		$("#demo1").navgoco('toggle', false);
	});

	$("#expandAll").click(function(e) {
		e.preventDefault();
		$("#demo1").navgoco('toggle', true);
	});
});

function searchMe(){
		
	$.ajax({
		type: "GET",
		url: '/search/'+selected_state,
		dataType: 'json',
		success: function(data){
			if(typeof(data) != 'undefined' && data.status == 'success' && data.cities != ''){
				//$('#load-cities').show();
				cities_html = '<option value="">Select City</option>';
				$.each(data.cities, function(key, value)
				{
					cities_html += '<option value="'+value.id+'">'+value.city_name+'</option>';
				}); 
				
				$('#city').html(cities_html);
				
			}
		}
	});
		
}