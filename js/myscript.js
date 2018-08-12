(function($) {
    $.fn.replaceTagName = function(replaceWith) {
        var tags = [],
            i    = this.length;
        while (i--) {
            var newElement = document.createElement(replaceWith),
                thisi      = this[i],
                thisia     = thisi.attributes;
            for (var a = thisia.length - 1; a >= 0; a--) {
                var attrib = thisia[a];
                newElement.setAttribute(attrib.name, attrib.value);
            };
            newElement.innerHTML = thisi.innerHTML;
            $(thisi).after(newElement).remove();
            tags[i - 1] = newElement;
        }
        return $(tags);
    };
})(window.jQuery);

window.winWidth = $(window).width();

$(document).ready(function() {
	$('.btn').each(function(){
		$(this).wrapInner('<span></span>');
	});

	if(winWidth <= 1024){
		$('#burger').prependTo($('body'));

		if(winWidth <= 640){
			$('.spec_view_block__image').appendTo($('.spec_view'));

			if($('footer').hasClass('maps')){
				$('.maps_caption').insertAfter($('.maps > .wrapper'));
				$('.copyright').appendTo($('.maps_caption'));
			}
			
			$('.phone').each(function(){
				var phone = $(this).text();
				
				$(this).html('<a class="mb_phone" href="tel:+7'+phone+'">'+phone+'</a>');
			});
			
			$('.price_all').appendTo($('.price_view_block.right'));
		}
	}

	$('.search_block_home form input[type="submit"], .search .search-form .search-submit').val('');

	if(winWidth <= 320){
		$('.home').css('height', $(window).height()+'px');
	}

	$('.about_view_license img').unwrap();

	$('.review_page_block').each(function(){
		var data_item = $(this).data('list-item');
		if(data_item <= 3){
			$(this).appendTo($('.review_page_col.left'));
			$(this).find('img').addClass('left');
		} else {
			$(this).appendTo($('.review_page_col.right'));
			$(this).find('img').addClass('center');
		}
	});

	$('.blog .more-link').parent().detach();

	$('.widget_wysija > .wysija-submit').detach();
	$('.modals_seller_form > .mod_consent').appendTo($('.widget_wysija'));
	$('#wysija_btn').appendTo($('.widget_wysija'));
	$('#form_seller').detach();
	$('.widget_wysija').addClass('mod modals_seller_form');

	if($('.about_view > div').hasClass('about_view_worker')){
		$('nav li.menu-item-188').addClass('current_page_parent');
		$('nav li > ul > li.menu-item-190').addClass('current_page_item');
	}

	if($('.about_view > div').hasClass('about_view_license')){
		$('nav li.menu-item-188').addClass('current_page_parent');
		$('nav li > ul > li.menu-item-256').addClass('current_page_item');
	}

	if($('.about_view > div').hasClass('about_view_history')){
		$('nav li > ul > li.menu-item-191').addClass('current_page_item');
	}

	if($('.blog').hasClass('page')){
		$('nav li.menu-item-247').addClass('current-menu-item');
	}
	
	if($('.service').hasClass('page')){
		$('nav li.menu-item-186').addClass('current-menu-item');
	}
});

$('.sub-menu').before('<span id="maccord" class="menu_accord" onclick="maccord();"></span>');

var menu_accord;
function maccord(data){
	if(!$('#maccord').hasClass('open')){
		$('#maccord').addClass('open').attr('data-open', 'true');
		$('#maccord').next().slideDown('300');
	} else {
		$('#maccord').removeClass('open').attr('data-open', 'false');
		$('#maccord').next().slideUp('300');
	}
}

/*$('#menu_accord').click(function(){
	menu_accord = $(this).attr('data-open');
	console.log(menu_accord);
	
	if(menu_accord == 'false'){
		$(this).addClass('open').attr('data-open', 'true');
		$(this).next().slideDown('300');
	} else {
		$(this).removeClass('open').attr('data-open', 'false');
		$(this).next().slideUp('300');
	}
});*/

$('.search_block_home input[type="submit"]').click(function(e){
	if(!$(this).hasClass('active')){
		e.preventDefault();

		$(this).addClass('active');
		$(this).parent().find('.search-field').addClass('active');
	}
});

$('.home .service_view_block small').each(function(){
	var this_a = $(this);
	if(this_a){
		var e_href = this_a.attr('href');
		this_a.attr({'id':'modal', 'data-modal-id': e_href}).removeAttr('href');
		this_a.replaceTagName('p');
	}
});

$(document).mouseup(function (e) {
	if($('.home').is('section')){
		var container = $('.search_block_home');

	  	if (container.has(e.target).length === 0){
	  		container.find('input').removeClass('active');
	  	}
	}
});

$('.mod_consent > input[type="checkbox"]').change(function(){
	if(!$(this).is(':checked')){
		$(this).parent().next().addClass('disabled').attr('disabled','disabled');
	} else {
		$(this).parent().next().removeClass('disabled').removeAttr('disabled');
	}
});

if(winWidth > 1024){
	$('#burger').click(function(){
		var header = $('.header');
		if(!header.hasClass('open')){
			header.addClass('open');
		} else {
			header.removeClass('open');
		}
	});
} else {
	$('#burger').click(function(){
		var header = $('.header');
		if(!header.hasClass('open')){
			$(this).addClass('open');
			header.addClass('open');
			if(winWidth <= 640){
				$('body').addClass('modal_bg');
			}
		} else {
			$(this).removeClass('open');
			header.removeClass('open');
			if(winWidth <= 640){
				$('body').removeClass('modal_bg');
			}
		}
	});
}

$('.more_text').click(function(){
	var data_more = $(this).data('more-block');
	$(this).fadeOut(200);

	switch(data_more){
		case 'advice_view__views' :
			$('.advice_view__views > div').eq(1).delay(200).slideDown(300);
		break;
		case 'spec_view_block__text' :
			$('.spec_view_block__text > .mob_more_text').delay(200).slideDown(300);
		break;
		default : break;
	}
});

$('.price_block_wrapp').click(function(){
	var price_popup = localStorage.getItem('price_popup');
	if(!price_popup){
		$('div#modal[data-modal-id="price"]').trigger('click');
		localStorage.setItem('price_popup', true);
	}

	if(!$(this).hasClass('selected')){
		$(this).addClass('selected');
		$('form.mod label > .text_area').prepend('<li class="text_area_element" data-price-id="'+$(this).data('price-id')+'" onclick="remove_price_form('+$(this).data('price-id')+');">'+$(this).find('p').eq(0).text()+'</li>');
	} else {
		$(this).removeClass('selected');
		$('form.mod label > .text_area > li[data-price-id="'+$(this).data('price-id')+'"]').detach();
	}
});

function remove_price_form(id){
	$('.price_view_block.visible .price_block_wrapp[data-price-id="'+id+'"]').trigger('click');
}
/*
$('.service_view_block ul > li').each(function(){
	var thia_a = $(this).children('a');
	if(thia_a){
		var this_service_mid = thia_a.attr('href');
		thia_a.attr({'id':'modal', 'data-modal-id': this_service_mid});
		thia_a.replaceTagName('p');
	}
});*/

$('.selected_group > p').click(function(){
	$('input[name="vrach"]').val($(this).text());
	$('.selected_active > span').text($(this).text());
});

var scroll_top = 0;
$(window).bind('scroll',function(){
	scroll_top = $(this).scrollTop();
});

var this_el, data_modal, this_modal;
$('div#modal, p#modal, span#modal, a#modal').click(function(e){
	this_el = $(this);
	data_modal = this_el.data('modal-id');
	this_modal = $('.modals[data-modal-id="'+data_modal+'"]');
	var window_width = $('footer').width();
	var window_height = $(document).height();

	console.log(data_modal);

	if(data_modal == 'rec' || data_modal == 'recall'){
		if(this_modal.find('.modals_rec_body').hasClass('display_none')){
			this_modal.find('.success').removeAttr('style');
			this_modal.find('.modals_rec_body').removeClass('display_none');
		}
	}

	if(winWidth > 640){
		if(data_modal == 'rec'){
			if(window_width > 1024){
				if(this_modal.attr('data-modal-open') == 'false'){
					$('.modals').each(function(){
						var modals_this = $(this);
						if(modals_this.attr('data-modal-open') == 'true'){
							modals_this.fadeOut(300, function(){
								this_el.removeClass('active');
							}).attr('data-modal-open', 'false')
						}
					});

					this_el.delay(200).addClass('active');
					this_modal.css('opacity',1).fadeIn(300).attr('data-modal-open', 'true');
				} else {
					this_modal.fadeOut(300, function(){
						this_el.removeClass('active');
					}).attr('data-modal-open', 'false');
				}
			} else {
				if(this_modal.attr('data-modal-open') == 'false'){
					$('body').addClass('modal_bg');
					this_modal.css({'display' : 'block'}).animate({'opacity' : 1}, 300).attr('data-modal-open', 'true');
				} else {
					this_modal.animate({'opacity' : 0}, 300, function(){
						$(this).removeAttr('style');
						$('body').removeClass('modal_bg');
					}).attr('data-modal-open', 'true');
				}
			}
			return;
		} else if(data_modal == 'recall'){
			if(this_modal.attr('data-modal-open') == 'false'){
				$('.modals').each(function(){
					var modals_this = $(this);
					if(modals_this.attr('data-modal-open') == 'true'){
						modals_this.fadeOut(300, function(){
							this_el.removeClass('active');
						}).attr('data-modal-open', 'false')
					}
				});

				this_modal.css('opacity',1).fadeIn(300).attr('data-modal-open', 'true');
			} else {
				this_modal.fadeOut(300).attr('data-modal-open', 'false');
			}
			return false;
		}

		if(data_modal == 'politics' || data_modal == 'price'){
			if(this_modal.attr('data-modal-open') == 'false'){
				this_modal.css({'display':'block', 'top': (scroll_top + 40)+'px'}).attr('data-modal-open', 'true');
				this_modal.animate({'opacity': 1}, 300);
			} else {
				this_modal.animate({'opacity' : 0}, 300, function(){
					$(this).attr('data-modal-open', 'false').removeAttr('style');
				});
			}
		}

		if(this_modal.hasClass('modals_service')){
			if(this_modal.attr('data-modal-open') == 'false'){
				$('.modals_service').each(function(){
					var modals_service = $(this);
					if(modals_service.attr('data-modal-open') == 'true'){
						modals_service.animate({'opacity' : 0}, 300, function(){
							$(this).attr('data-modal-open', 'false').removeAttr('style');
						});
					}
				});

				this_modal.attr('data-modal-open', 'true');

				var padding_horizontal = {left: parseInt($('footer > .wrapper').css('padding-left')), right: parseInt($('footer > .wrapper').css('padding-right'))}
				var this_width = this_el.width();
				var this_height = this_el.height();
				var this_left = this_el.offset().left;
				var this_top = this_el.offset().top;
				var percent = window_width / 100;
				var modal_position;

				this_modal.css({'display':'block'});

				var modal_width = this_modal.innerWidth();
				var modal_height = this_modal.innerHeight();

				if(window_width > 768){
					var document_with = {left: [0, (30 * percent)], center: [(30 * percent), (60 * percent)], right: [(60 * percent), (100 * percent)]};

					if(this_left > document_with.left[0] && this_left < document_with.left[1]){
						modal_position = 'left';
					} else if(this_left > document_with.center[0] && this_left < document_with.center[1]){
						modal_position = 'center';
					} else {
						modal_position = 'right';
					}
				} else {
					var document_with = {left: [0, (50 * percent)], right: [(50 * percent), (100 * percent)]};

					if(this_left > document_with.left[0] && this_left < document_with.left[1]){
						modal_position = 'left';
					} else {
						modal_position = 'right';
					}
				}

				if(window_width > 768){
					switch(modal_position){
						case 'left' :
							this_modal.css({'left':padding_horizontal.left});
						break;
						case 'center' :
							if(window_width > 1024){
								this_modal.css({'left':this_left});
							} else {
								this_modal.css({'left':((window_width - modal_width) / 2)+'px'});
							}
						break;
						case 'right' :
							this_modal.css({'right':padding_horizontal.right});
							if((this_modal.offset().left + modal_width) > (window_width - padding_horizontal.right)){
								this_modal.css({'right': 'initial', 'left': (window_width - padding_horizontal.right - modal_width)+'px'});
							}
						break;
						default : break;
					}
				}

				console.log(window_height);

				if((this_top + this_height + modal_height + 30) > window_height){
					this_modal.css({'top': 'initial', 'bottom': (this_top - modal_height)+'px'});
				} else {
					this_modal.css({'top': (this_top + this_height)+'px'});
				}
				
				this_modal.animate({'opacity' : 1}, 300);
			} else{
				this_modal.animate({'opacity' : 0}, 300, function(){
					$(this).attr('data-modal-open', 'false').removeAttr('style');
				});
			}
		}

		if(data_modal == 'seller' || data_modal == 'review'){
			if(this_modal.attr('data-modal-open') == 'false'){
				var this_height = this_el.height();
				var this_top = this_el.offset().top;

				this_modal.attr('data-modal-open', 'true');
				this_modal.css({'display':'block','top':(this_top + this_height + 30)+'px'});

				this_modal.animate({'opacity': 1}, 300);
			} else {
				this_modal.animate({'opacity' : 0}, 300, function(){
					$(this).attr('data-modal-open', 'false').removeAttr('style');
				});
			}			
		}
	} else {
		if(this_modal.attr('data-modal-open') == 'false'){
			console.log('modal_open');
			$('body').addClass('modal_bg');
			this_modal.css({'display' : 'block'}).animate({'opacity' : 1}, 300).attr('data-modal-open', 'true');
		} else {
			console.log('modal_close');
			this_modal.animate({'opacity' : 0}, 300, function(){
				$(this).removeAttr('style');
				$('body').removeClass('modal_bg');
			}).attr('data-modal-open', 'false');
		}
	}
});

function modal_close(modal_id){
	console.log(modal_id);
	switch(modal_id){
		case 'rec':
		case 'seller':
		case 'review':
			$('div#modal[data-modal-id="'+modal_id+'"]').trigger('click');
		break;
		case 'recall':
			$('span#modal[data-modal-id="'+modal_id+'"]').trigger('click');
		break;
		case 'politics':
			$('a#modal[data-modal-id="'+modal_id+'"]').trigger('click');
		break;
		default :
			$('p#modal[data-modal-id="'+modal_id+'"]').trigger('click');
		break;
	}
}

$('.modals_close').click(function(){
	var close_modal = $(this).parents('.modals');
	var close_modal_id = close_modal.data('modal-id');

	console.log('click '+close_modal_id);

	if(close_modal_id == 'price'){
		close_modal.fadeOut(300, function(){
			$(this).detach();
		});
	} else {
		if($('body').hasClass('home')){
			if(!close_modal.hasClass('modals_service')){
				modal_close(close_modal_id);
			}
		} else {
			modal_close(close_modal_id);
		}
	}
});

$(document).mouseup(function (e) {
	if($('.modals[data-modal-open="true"]').is('div') && winWidth > 1024){
		var container = $('.modals[data-modal-open="true"]');

	  	if (container.has(e.target).length === 0){
	  		modal_close(container.attr('data-modal-id'));
	  	}
	}
});

$('form.mod label > .text_area textarea').focusin(function(){
	$('form.mod label > .text_area').addClass('focus');
});

$('form.mod label > .text_area textarea').focusout(function(){
	$('form.mod label > .text_area').removeClass('focus');
});

jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function(arg) {
    return function( elem ) {
        return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
});

Array.prototype.contains = function(element){
	return this.indexOf(element) > -1;
};

function click_pbw(id){
	remove_price_form(id);

	data_pbw = $('.search_results .price_block_wrapp[data-price-id="'+id+'"]');

	if(!data_pbw.hasClass('selected')){
		data_pbw.addClass('selected');
	} else {
		data_pbw.removeClass('selected');
	}
}

$('#search_price').submit(function(e){
	e = e || event;
	e.preventDefault();
});

$('input.remove').click(function(){
	$('#search_price input[name="search"]').val('');
	$('#search_price input[name="search"]').trigger('input');
});

var search_price = [];
$('#search_price input[name="search"]').bind('input',function(e){
	data_search = $(this).val();

	console.log(data_search);

	if(data_search == '' || data_search == null){
		$('.price_view_block.search_result .search_results > li').fadeOut(200, function(){
			$(this).detach();
			$('input.remove').removeClass('visible');
			$('.price_view_block.search_result').removeClass('nohidden');
		});
		return false;
	} else {
		$('input.remove').addClass('visible');
	}

	new_search_price = [];

	$('.contains').each(function(){
		data_id = $(this).parent().data('price-id');

		new_search_price.push(data_id);
	});

	$('.price_view_block.visible .price_block_wrapp > p:first-child').removeClass('contains');
	$('.price_view_block.visible .price_block_wrapp > p:first-child:Contains("'+data_search+'")').addClass('contains');

	$('.price_view_block.visible .price_block_wrapp > p.contains').each(function(){
		if(!$('.price_view_block.search_result').hasClass('nohidden')){
			$('.price_view_block.search_result').addClass('nohidden');
		}

		data_s_id = $(this).parent().data('price-id');

		if(!$('.search_results').find('.price_block_wrapp').is('[data-price-id="'+data_s_id+'"]')){
			clone_li = $(this).parents('li').clone();
			clone_li.css('opacity', 0);
			clone_li.find('.price_block_wrapp').attr('onclick','click_pbw('+data_s_id+');');
			clone_li.appendTo($('.search_results'));
			clone_li.animate({'opacity': 1}, 200);
		}

		search_price.push(data_s_id);
	});

	$('.search_results > li').each(function(){
		data_r = $(this).find('.price_block_wrapp').data('price-id');

		is_find = search_price.contains(data_r);
		if(is_find === false){
			console.log(false);
			$(this).fadeOut(200, function(){
				$(this).detach();
			});
		} 
	});

	setTimeout(function(){
		if(data_search != '' || data_search != null){
			var is_li = $('.search_results').contents();
			console.log(is_li.length);

			if(is_li.length == 0){
				$('.search_results').prepend('<li class="no_result">Результаты не найдены.</li>');
			} else {
				$('.search_results > li.no_result').fadeOut(200, function(){
					$(this).detach();
				});
			}
		}
	},300);

	search_price = [];
});

function my_handler_form(form_id, data_set){
	var data = {
		'action': 'handlerform',
		'form_data': data_set,
	};

	console.log(data_set);

	$.ajax({
		url: ajaxurl, // обработчик
		data: data, // данные
		type: 'post', // тип запроса
		success:function(data){
			my_form = $('.'+form_id);
			my_form_width = my_form.width();
			my_form_height = my_form.height();

			success_text = my_form.find('.success');
			success_text.css('display','block');
			success_text_width = success_text.width();
			success_text_height = success_text.height();
			success_text.css({'top':((my_form_height - success_text_height) / 2)+'px'});

			my_form.find('.modals_rec_body, .modals_recall_body').animate({'opacity': 0}, 200);
			success_text.delay(150).animate({'opacity': 1}, 200);
		}
	});
}

$('#form_rec').submit(function(e){
	e = e || event;
	e.preventDefault();

	var my_form = $(this);
	var error = false;

	if(my_form.find('input.required, textarea.required')){
	    my_form.find('input.required, textarea.required').removeClass('error');
	    my_form.find('input.required + p, textarea.required + p').detach();

	    my_form.find('input.required, textarea.required').each(function(){
	    	my_text = $(this).val();

	      	if(my_text == '' || my_text == undefined){
	        	$(this).addClass('error').after('<p>Это поле нужно заполнить</p>');
	        	error = true;
	      	}
	    });
	}

	if(!error){
		var data_set = {};
		data_set.user_name = my_form.find('input[name="name"]').val();
		data_set.user_phone = my_form.find('input[name="phone"]').val();
		data_set.specialist = my_form.find('input[name="vrach"]').val();

		povod = '';
		my_form.find('.text_area > .text_area_element').each(function(){
			povod += $(this).text() + "\r\n";
		});

		data_set.user_service = povod;

		if(my_form.find('.text_area textarea').val() != ''){
			data_set.user_comment = my_form.find('.text_area textarea').val() + "\r\n";
		}

		

		my_handler_form('modals_rec', data_set);
	}
});

$('#form_recall').submit(function(e){
	e = e || event;
	e.preventDefault();

	var my_form = $(this);
	var error = false;

	if(my_form.find('input.required')){
	    my_form.find('input.required').removeClass('error');
	    my_form.find('input.required + p, textarea.required + p').detach();

	    my_form.find('input.required').each(function(){
	    	my_text = $(this).val();

	      	if(my_text == '' || my_text == undefined){
	        	$(this).addClass('error').after('<p>Это поле нужно заполнить</p>');
	        	error = true;
	      	}
	    });
	}

	if(!error){
		var data_set = {};
		data_set.user_name = my_form.find('input[name="name"]').val();
		data_set.user_phone = my_form.find('input[name="phone"]').val();

		my_handler_form('modals_recall', data_set);
	}
});

$('.blog_rubric a').each(function(){
	if($(this).hasClass('active')){
		$(this).attr('href','../blog/');
	}
});

function find_file(array, value) {
	if (array.indexOf) { // если метод существует
		return array.indexOf(value);
	}
    
	for (var i = 0; i < array.length; i++) {
		if (array[i] === value) return i;
	}
    
	return -1;
}

var file_review, review_error;
$('#review_file').change(function(){
	file_review = this.files;
	console.log(file_review);

	review_error = false;

	var file_format = ['image/jpeg', 'image/png', 'image/gif'];

	$('.form_files .form_files_area').empty();

	$.each( $(this).prop('files') , function( key, value ){
        if(value.size > 5100000){
        	$('.form_files').append('<p class="error">Файл: '+value.name+' слишком большой!</p>');
        	review_error = true;
        } else {
        	if(find_file(file_format, value.type) != -1){
        		$('.form_files .form_files_area').text(value.name);
        	} else {
        		review_error = true;
        		$('.form_files').append('<p class="error"> Неверный формат файла: '+value.name+'</p>');
        	}
        }
    });
});

$('#form_review').submit(function(e){
	e = e || event;
	e.preventDefault();

	var my_form = $(this);

	if(my_form.find('input.required')){
	    my_form.find('input.required').removeClass('error');
	    my_form.find('input.required + p, textarea.required + p').detach();

	    my_form.find('input.required, textarea.required').each(function(){
	    	my_text = $(this).val();

	      	if(my_text == '' || my_text == undefined){
	        	$(this).addClass('error').after('<p>Это поле нужно заполнить</p>');
	        	review_error = true;
	      	}
	    });
	}

	if(!review_error){
		var data_set = {};
		data_set.user_name = my_form.find('input[name="name"]').val();
		data_set.user_text = my_form.find('textarea[name="review_text"]').val();

		var data = {
			'action': 'addreview',
			'form_data': data_set,
		};

		console.log(data);

		$.ajax({
			url: ajaxurl, // обработчик
			data: data, // данные
			type: 'post', // тип запроса
			dataType: 'json',
			success:function(json){


				if(json.success) var post_id = json.post_id;

				if(file_review){
				    console.log(file_review);

				    var files = new FormData();
				    $.each( file_review, function( key, value ){
				        files.append( key, value );
				    });

					$.ajax({
						url: function_file, // обработчик
						data: files,
						type: 'post',
						dataType: 'json',
						processData: false, 
        				contentType: false,
						success:function(json){
							if(json.success){
								var public_data = {
									'action': 'setattachmedia',
									'media_url': json.file,
									'post_id': post_id,
								};

								$.ajax({
									url: ajaxurl, // обработчик
									data: public_data, // данные
									type: 'post', // тип запроса
									dataType: 'json',
									success:function(json){
										if(json.success){
											$('.modals_review > .modals_recall_body').empty();
											$('.modals_review > .success').appendTo($('.modals_review > .modals_recall_body'));
										}
									}
								});
							}
						}
					});
				} else {
					if(json.success){
						$('.modals_review > .modals_recall_body').empty();
						$('.modals_review > .success').appendTo($('.modals_review > .modals_recall_body'));
					}
				}

				//success_text = my_form.find('.success');
				//success_text.css('display','block');
				//success_text_width = success_text.width();
				//success_text_height = success_text.height();
				//success_text.css({'top':((my_form_height - success_text_height) / 2)+'px'});

				//my_form.find('.modals_rec_body, .modals_recall_body').animate({'opacity': 0}, 200);
				//success_text.delay(150).animate({'opacity': 1}, 200);
			}
		});
	}
});