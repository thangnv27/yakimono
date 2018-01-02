jQuery(document).ready(function() {
	'use strict';
	var checkEmail = function(email) {
		var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return emailRegex.test(email);
	};

	jQuery(document).on('click', '.refresh-captcha', function(e) {
		e.preventDefault();
		var captchaType = jQuery('.refresh-captcha').data('captcha-type');
		var captchaStringLength = jQuery('.refresh-captcha').data('captcha-string-length');

		jQuery('#captcha').attr('src', themeUrl + '/includes/securimage/securimage_show.php?type='+captchaType+'&length='+captchaStringLength+'&rand=' + Math.random());
	});

	jQuery(document).on("focus", "#reservation-form input, #reservation-form textarea", function(e) {
		jQuery(this).parent().removeClass('error');
		if (additionalRevervationInfo) {
			jQuery(this).parent().find('small.error').remove();
		}
	});

	jQuery(document).on("focus", "#contact-form input, #contact-form textarea", function(e) {
		jQuery(this).parent().removeClass('error');
	});

	jQuery(document).on("submit", "#reservation-form", function(e) {
		e.preventDefault();

		if (additionalRevervationInfo) {
			jQuery(this).parent().find('small.error').remove();
			jQuery('#date-error').remove();
		}

		if (!disableReservationPicker) {
			checkOpeningTime();	
		}

		var name = jQuery('#form-name'),
			email = jQuery('#form-email'),
			phone = jQuery('#form-phone'),
			amount = jQuery('#form-amount'),
			message = jQuery('#form-message'),
			day = jQuery('#day').val(jQuery('.select-time.day span').text()),
			month = jQuery('#month').val(jQuery('.select-time.month span').text()),
			year = jQuery('#year').val(jQuery('.select-time.year span').text()),
			hour = jQuery('#hour').val(jQuery('.select-time.hour span').text()),
			minute = jQuery('#minute').val(jQuery('.select-time.minutes span').text()),
			captcha = jQuery("#form-captcha");
			var ampm = '';
			if (jQuery('#ampm').length) {
				ampm = jQuery('#ampm').val(jQuery('.select-time.part').text());
			}

		var data_reser = {
			'captcha' : captcha.val(),
			'name' : name.val(),
			'email' : email.val(),
			'phone' : phone.val(),
			'amount' : amount.val(),
			'message' : message.val(),
			'day' : day.val(),
			'month' : month.val(),
			'year' : year.val(),
			'hour' : hour.val(),
			'minute' : minute.val(),
			'ampm' : ampm.val(),
			'action' : 'send-reservation-form'
		};

		if (jQuery('#form-custom-1').length) {
			data_reser['custom-1'] = jQuery('#form-custom-1').val();
		}
		if (jQuery('#form-custom-2').length) {
			data_reser['custom-2'] = jQuery('#form-custom-2').val();
		}
		if (jQuery('#form-custom-3').length) {
			data_reser['custom-3'] = jQuery('#form-custom-3').val();
		}

		jQuery.ajax({
			url: sendReservationFormMessage.ajaxUrl,
			type: 'POST',
			dataType: 'json',
			data: data_reser,
			beforeSend: function() {
				var errors = false,
				validate = function() {
					errors = false;

					// Date validation
					if (!disableReservationPicker) {
						if (jQuery('div.select-time.day').hasClass('error') ) {
							jQuery('div.select-time.day, div.select-time.month, div.select-time.year, div.select-time.hour, div.select-time.minutes, div.select-time.part').addClass('error');
							errors = true;
						}
					}

					// Captcha validation
					if (typeof captcha.val() != 'undefined') {
						if (captcha.val().length === 0) {
							captcha.parent().addClass('error');
							if (additionalRevervationInfo) {
								captcha.parent().append('<small class="error">'+captchaValidationError+'</small>');
							}
							errors = true;
						} else {
							captcha.parent().removeClass('error');
						}
					}

					// Name and other reservation inputs validation
					if (requiredReservationName) {
						if (name.val().length === 0) {
							name.parent().addClass('error');
							if (additionalRevervationInfo) {
								name.parent().prepend('<small class="error">'+nameValidationError+'</small>');
							}
							errors = true;
						} else {
							name.parent().removeClass('error');
						}
					}

					if (requiredReservationEmail) {
						if (email.val().length === 0) {
							email.parent().addClass('error');
							if (additionalRevervationInfo) {
								email.parent().prepend('<small class="error">'+emailValidationError+'</small>');
							}
							errors = true;
						} else if(!checkEmail(email.val())) {
							email.parent().addClass('error');
							if (additionalRevervationInfo) {
								email.parent().prepend('<small class="error">'+emailValidationError+'</small>');
							}
							errors = true;
						} else {
							email.parent().removeClass('error');
						}
					}

					if (requiredReservationEmail) {
						if (phone.val().length === 0) {
							phone.parent().addClass('error');
							if (additionalRevervationInfo) {
								phone.parent().prepend('<small class="error">'+phoneValidationError+'</small>');
							}
							errors = true;
						} else {
							phone.parent().removeClass('error');
						}
					}

					if (requiredReservationPeople) {
						if (amount.val().length === 0) {
							amount.parent().addClass('error');
							if (additionalRevervationInfo) {
								amount.parent().prepend('<small class="error">'+amountValidationError+'</small>');
							}
							errors = true;
						} else {
							amount.parent().removeClass('error');
						}
					}

					if (requiredReservationMessage) {
						if(message.val().length === 0) {
							message.parent().addClass('error');
							if (additionalRevervationInfo) {
								message.parent().prepend('<small class="error">'+messageValidationError+'</small>');
							}
							errors = true;
						} else {
							message.parent().removeClass('error');
						}
					}
				};

				validate();

				if (custom1Required) {
					if(jQuery('#form-custom-1').val().length === 0) {
						jQuery('#form-custom-1').parent().addClass('error');
						if (additionalRevervationInfo) {
							jQuery('#form-custom-1').parent().prepend('<small class="error">'+custom1ValidationError+'</small>');
						}
						errors = true;
					} else {
						jQuery('#form-custom-1').parent().removeClass('error');
					}
				}

				if (custom2Required) {
					if(jQuery('#form-custom-2').val().length === 0) {
						jQuery('#form-custom-2').parent().addClass('error');
						if (additionalRevervationInfo) {
							jQuery('#form-custom-2').parent().prepend('<small class="error">'+custom2ValidationError+'</small>');
						}
						errors = true;
					} else {
						jQuery('#form-custom-2').parent().removeClass('error');
					}
				}

				if (custom3Required) {
					if(jQuery('#form-custom-3').val().length === 0) {
						jQuery('#form-custom-3').parent().addClass('error');
						if (additionalRevervationInfo) {
							jQuery('#form-custom-3').parent().prepend('<small class="error">'+custom3ValidationError+'</small>');
						}
						errors = true;
					} else {
						jQuery('#form-custom-3').parent().removeClass('error');
					}
				}

				if(errors) {
					return false;
				}
			}
		}).done(function(responseData) {
			if(responseData.success === true) {
				jQuery('.alert-success').removeClass('hidden');
				setTimeout(function () {
					jQuery('.alert-success').addClass('hidden');
				}, 3000);
				name.val('');
				if (typeof captcha.val() != 'undefined') {
					captcha.val('');
				}

				email.val('');
				phone.val('');
				amount.val('');
				message.val('');
				
				if (jQuery('#form-custom-1').length) {
					jQuery('#form-custom-1').val('');
				}
				if (jQuery('#form-custom-2').length) {
					jQuery('#form-custom-2').val('');
				}
				if (jQuery('#form-custom-3').length) {
					jQuery('#form-custom-3').val('');
				}
			} else {
				var input = jQuery('#'+responseData.data[0].id);
					input.parent().addClass('error');
			}
		}).fail(function() {
			// handle server fail here
		});
	});

	jQuery(document).on("submit", "#contact-form", function(e) {
			e.preventDefault();

			var name = jQuery('#form-name'),
				email = jQuery('#form-email'),
				subject = jQuery('#form-subject'),
				message = jQuery('#form-message'),
				type = jQuery('#form-type'),
				captcha = jQuery('#form-captcha');

			var data = {
				'captcha' : captcha.val(),
				'form-name': name.val(),
				'form-email' : email.val(),
				'form-subject' : subject.val(),
				'form-message' : message.val(),
				'form-type': type.val(),
				'action' : 'send-contact-form'
			};

			jQuery.ajax({
				url: sendContactFormMessage.ajaxUrl,
				type: 'POST',
				dataType: 'json',
				data: data,
				beforeSend: function() {
					var errors = false,
					validate = function() {
						errors = false;

						if (typeof captcha.val() != 'undefined') {
							if(captcha.val().length === 0) {
								captcha.parent().addClass('error');
								errors = true;
							} else {
								captcha.parent().removeClass('error');
							}
						}

						//
						if(name.val().length === 0) {
							name.parent().addClass('error');
							errors = true;
						} else {
							name.parent().removeClass('error');
						}

						if(email.val().length === 0) {
							email.parent().addClass('error');
							errors = true;
						} else if(!checkEmail(email.val())) {
							email.parent().addClass('error');
							errors = true;
						} else {
							email.parent().removeClass('error');
						}

						if(subject.val().length === 0) {
							subject.parent().addClass('error');
							errors = true;
						} else {
							subject.parent().removeClass('error');
						}

						if(message.val().length === 0) {
							message.parent().addClass('error');
							errors = true;
						} else {
							message.parent().removeClass('error');
						}
					};

					validate();
					
					if(errors) {
						return false;
					}

				}
			}).done(function(responseData) {
				if(responseData.success === true) {
					jQuery('.alert-success').removeClass('hidden');
					setTimeout(function () {
						jQuery('.alert-success').addClass('hidden');
					}, 3000);
					name.val('');
					captcha.val('');
					email.val('');
					subject.val('');
					message.val('');
				} else {
					var input = jQuery('#'+responseData.data[0].id);
					input.parent().addClass('error');
				}
			}).fail(function() {
				
			});
		});
});
