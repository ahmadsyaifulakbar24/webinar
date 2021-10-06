$.ajax({
    url: `${api_url}/training/fetch`,
    type: 'GET',
    data: {
    	limit: 60
    },
    beforeSend: function(xhr) {
        xhr.setRequestHeader("Authorization", "Bearer " + token)
    },
    success: function(result) {
    	console.log(result)
        $.each(result.data, function(index, value) {
            append = `<div class="col-xl-3 col-md-4 col-sm-6 mb-4">
				<div class="card pb-5" style="height:100%">
					<a href="${root}/admin/kelas/${value.id}" class="text-dark">
						<img class="card-img-top" src="${value.poster_url}">
						<p class="text-justify mt-3 px-3">Topik: <b>${value.topic}</b></p>
						<p class="px-3">Kode Kelas: <b>${value.code}</b></p>
					</a>
					<a class="bg-light pointer text-secondary text-center border-top px-3 py-2 mb-4" style="position:absolute;bottom:-1.5rem;width:100%" onclick="return copyToClipboard('${value.code}')">
						<small><i class="fa fa-copy pr-2"></i>Salin Kode Kelas</small>
					</a>
				</div>
			</div>`
	        $('#data').append(append)
        })
    }
})

function copyToClipboard(code) {
    var aux = document.createElement("input");
    aux.setAttribute("value", code);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
    $('#copy').fadeIn(200)
    setTimeout(function() {
        $('#copy').fadeOut(200)
    }, 2000)
}
