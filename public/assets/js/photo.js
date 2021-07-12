let photo = null

$(document).ready(function() {
    $croppie = $('#photo-preview').croppie({
        viewport: {
            width: 250,
            height: 250,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        },
        enableOrientation: true
    })
    $("#RotateClockwise").on("click", function() {
        $croppie.croppie('rotate', 90);
    })
    $("#RotateAntiClockwise").on("click", function() {
        $croppie.croppie('rotate', -90);
    })
})

$('#choose').click(function() {
    $('#photo').click()
})

$('#photo').change(function() {
    let file = this.files[0]
    let fileType = file['type']
    let fileSize = file['size']
    let fileName = file['name']

    // if (fileType == 'image/jpeg') {
    if (fileSize <= 10000000) {
        if ($('#photo')[0].files.length !== 0) {
            $('#modal-photo').modal('show')
            $('#photo-body').show()
            var reader = new FileReader()
            reader.onload = function(event) {
                $croppie.croppie('bind', {
                    url: event.target.result
                }).then(function() {})
            }
            reader.readAsDataURL(this.files[0])
        }
    } else {
        $('#photo').addClass('is-invalid')
        $('#photo').siblings('.invalid-feedback').html('Ukuran maksimum 10MB')
    }
    // } else {
    //     $('#photo').addClass('is-invalid')
    //     $('#photo').siblings('.invalid-feedback').html('Format file JPG')
    // }
})

$('#apply').click(function(event) {
    $croppie.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        // console.log(response)
        photo = DataURIToBlob(response)
        var FR = new FileReader()
        FR.readAsDataURL(DataURIToBlob(response))
        FR.addEventListener("load", function(e) {
            document.getElementById("image").src = e.target.result
        })
        $('#modal-photo').modal('hide')
    })
})

$('#modal-photo').on('hidden.bs.modal',function(e) {
	$('#photo').val('')
})

function DataURIToBlob(dataURI) {
    const splitDataURI = dataURI.split(',')
    const byteString = splitDataURI[0].indexOf('base64') >= 0 ? atob(splitDataURI[1]) : decodeURI(splitDataURI[1])
    const mimeString = splitDataURI[0].split(':')[1].split(';')[0]

    const ia = new Uint8Array(byteString.length)
    for (let i = 0; i < byteString.length; i++)
        ia[i] = byteString.charCodeAt(i)

    return new Blob([ia], { type: mimeString })
}
