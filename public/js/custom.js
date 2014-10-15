$('#ad-state').on('change', function(){
        
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
			}
		}
	});
}
function loadAttribute(fields){
	field_html = '';
	$.each(fields, function(k, v)
	{
		field = makeTag(v.field_type, v.field_value, v.id);
		field_html += '<div class="form-section">';
		field_html += '<label class="control-label form-section-left">'+v.field_label+'<span class="impred">*</span></label>';
		field_html += '<div class="form-section-right">'+field+'</div>';
		field_html += '<div class="form-section-third"></div></div>';				
	});	
	$('#load-attributes').show();
	$('#load-attributes').html(field_html);
}
function makeTag(type, value, id){
	tag = '';
	if(type == 'text'){
		tag = '<input type="text" name="attribute'+id+'" />';			
	}
	else if(type == 'list'){
		tag += '<select name="attribute'+id+'" />';
		var value = JSON.parse( value );
		alert(value);
		$.each(value, function(k, v)
		{
			tag += '<option value="'+value.val+'">'+value.val+'<option>';
		});
		tag += '</select>';		
	}	
	return tag;
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
				loadAttribute(data.fields);
				
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