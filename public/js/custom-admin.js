function getRootUrl () {
	return window.location.origin?window.location.origin+'/':window.location.protocol+'/'+window.location.host+'/';
}
jQuery(document).ready(function($) {
	var base = getRootUrl();
	$('.refresh').on('click',function(event) {
		var boton = $(this);
		var no    = 0;
		if ($(this).hasClass('active')) {
			url = 'public/administrador/desactivar';
			//local
			//url = 'tecnographic/public/administrador/desactivar';
		}else
		{
			//local
			url = 'public/administrador/activar';
			//url = 'tecnographic/public/administrador/activar';
		}
		$.ajax({
			url: base+url,
			type: 'POST',
			dataType: 'json',
			data: {
				'id' : $(this).val()
			},
			beforeSend:function () {
				boton.hide('fast', function() {
					boton.after('<img src="'+base+'public/images/loader.gif" class="loading">');
				});
			},
			success:function(response) {
				if (boton.hasClass('active')) {
					boton.removeClass('active').html('Activar');
				}else
				{
					boton.addClass('active').html('Desactivar');
				}
				$('.loading').hide('fast', function() {
					boton.show('fast')
					$(this).remove();
				});
				$('.responseDanger').addClass('alert-'+response.type).html(response.msg);

				setTimeout(function () {
					$('.responseDanger').hide('slow', function() {
						$(this).removeClass('alert-success').removeClass('alert-danger');
					});
				},5000);
			}
		})
	});

	$('.deleteSlide').on('click', function(event) {
		$(this).addClass('to-elim')
		$('.envElim').val($(this).val()).data('target','.to-elim');
	});
	$('.modal').on('hide.bs.modal', function(event) {
		$('.to-elim').removeClass('to-elim');
	});
	$('.envElim').on('click', function(event) {
		event.preventDefault();
		var boton = $(this);
		$.ajax({
			url: base+'public/administrador/eliminar-slide',
			//local
			//url: base+'tecnographic/public/administrador/eliminar-slide',
			type: 'POST',
			dataType: 'json',
			data: {
				'id' : $(this).val()
			},
			beforeSend:function () {
				boton.hide('fast', function() {
					boton.after('<img src="'+base+'public/images/loader.gif" class="loading">');
				});
			},
			success:function(response) {
				$('.loading').hide('fast', function() {
					boton.show('fast')
					$('.responseDanger').addClass('alert-'+response.type).html(response.msg).show('fast');
					$('.to-elim').parent().parent('tr').remove();
					$('.modal').modal('hide');
					$(this).remove();
				});
				setTimeout(function () {
					$('.responseDanger').hide('slow', function() {
						$(this).removeClass('alert-success').removeClass('alert-danger');
					});
				},5000);
			}
		})
	});
	$('.form-validate').on('focus', function(event) {
		$(this).removeClass('form-invalid').next('p').remove();
	});
	$('.btnSendServ').on('click', function(event) {
		$(this).removeClass('form-invalid').next('p').remove();
		var proceed = 1;
		$('.form-validate').each(function(index, el) {
			if ($(el).val() == "") {
				proceed = 0;
				$(el).after('<p class="someError">Debe llenar este campo.</p>').addClass('form-invalid')
			};
		});
		if (proceed == 1) {
			$('.form-serv').submit();
		};
		
	});
	$('.subServ').change(function(event) {
		if ($(this).val() == "") {
			$('.serv').show('fast');
		}else
		{
			$('.serv:not(:has(.serv_'+$(this).val()+'))').hide('fast');
		}
	});
});

jQuery(document).ready(function($) {
	var base = getRootUrl();
	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template");
	previewNode.id = "";
	var previewTemplate = previewNode.parentNode.innerHTML;
	previewNode.parentNode.removeChild(previewNode);
	$('.postion').change(function(event) {
		if ($(this).val() != "") {
			$('.fileinput-button').show('fast')
		}else
		{
			$('.fileinput-button').hide('fast')
		}
		var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
		  url: base+"public/administrador/nuevos-slides/procesar", // Set the url
		  //local
		  //url: base+"tecnographic/public/administrador/nuevos-slides/procesar", // Set /the url
		  thumbnailWidth: 80,
		  thumbnailHeight: 80,
		  parallelUploads: 20,
		  previewTemplate: previewTemplate,
		  params: {
		  	tipo : $('.postion').val()
		  },
		  autoQueue: false, // Make sure the files aren't queued until manually added
		  previewsContainer: "#previews", // Define the container to display the previews
		  clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
		});
		myDropzone.on("addedfile", function(file) {
		  // Hookup the start button
		  file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
		});

		// Update the total progress bar
		myDropzone.on("totaluploadprogress", function(progress) {
		  $("#total-progress .progress-bar").css('width',progress+"%") ;
		});

		myDropzone.on("sending", function(file) {
		  // Show the total progress bar when upload starts
		  $("#total-progress").css('opacity',1);
		  // And disable the start button
		  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
		});

		// Hide the total progress bar when nothing's uploading anymore
		myDropzone.on("queuecomplete", function(progress) {
		  $("#total-progress").css('opacity',0);
		});

		// Setup the buttons for all transfers
		// The "add files" button doesn't need to be setup because the config
		// `clickable` has already been specified.
		$(".start").on('click', function() {
		  myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
		});
		$(".cancel").on('click',function() {
		  myDropzone.removeAllFiles(true);
		});
		myDropzone.on("success", function(progress) {
		  $(".progress").hide('fast', function() {
		  	$(this).after('<i class="fa fa-check fa-3x fa-invisible"></i>');
		  	$('.fa-invisible').show('fast');
		  	$(this).remove();
		  });
		});
		
	});

});