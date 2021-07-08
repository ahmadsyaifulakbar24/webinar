$(document).ready(function(){

	var image = $('#image-preview').croppie({
		viewport: {
			width: 200,
			height: 200,
			type: 'square'
		},
		boundary: {
			width: 300,
			height: 300
		}
	})
	// image.croppie('bind', {
	// 	url: 'img/user.jpg'
	// })

	// $('.vanilla-rotate').on('click', function(event){
	// 	image.croppie('rotate', parseInt($(this).data('deg')))
	// })

	$('#image').change(function(){
        if($('#image')[0].files.length !== 0) {
			// $('#image-form').hide()
			$('#image-preview').show()
			var reader = new FileReader()
			reader.onload = function(event){
				image.croppie('bind',{
					url: event.target.result
				}).then(function(){
					$('#upload').attr('disabled',false)
				})
			}
			reader.readAsDataURL(this.files[0])
		}
	})

	$('#upload').click(function(event){
		image.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function(response){
			$('#upload').attr('disabled',true)
			$.ajax({
				url: "http://siwira.id/api/user/uploadImage",
				type: "POST",
				data: {
					user_id: id,
					profile_picture: response
				},
				success: function(data) {
					$('#upload').attr('disabled',true)
		        },
		        complete: function() {
		        	$('#modal-photo').modal('hide')
		        	$('#alert-photo').show()
		        	setTimeout(function() {
						$('#alert-photo').fadeOut(300)
					}, 2000)
					$('#profile_picture').attr('src',response)
   		        }
		    })
		})
	})
})