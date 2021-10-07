// if (localStorage.getItem('name')) $('.name').html(localStorage.getItem('name'))
// if (localStorage.getItem('photo')) $('.avatar').attr('src', localStorage.getItem('photo'))
const token = localStorage.getItem('token')
const user_id = localStorage.getItem('user_id')
const role = localStorage.getItem('role')

$(document).on('keydown', 'input', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('keydown', 'textarea', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('change', 'select', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('click', 'input[name="gender"]', function() {
    $('#gender').removeClass('is-invalid')
})
$(document).on('change', 'input[type="date"]', function() {
    $(this).removeClass('is-invalid')
})
$(document).on('change', 'input[type=file]', function() {
    $(this).removeClass('is-invalid')
})

function logout() {
    $.ajax({
        url: `${api_url}/auth/logout`,
        type: 'POST',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token)
        },
        success: function() {
            localStorage.clear()
            $.ajax({
                url: `${root}/session/logout`,
                type: 'GET',
                success: function() {
                    location.href = root
                }
            })
        }
    })
}

function pagination(links, meta, path) {
    let current = meta.current_page
    let replace = path + '?page='

    let first = links.first.replace(replace, '')
    if (first != current) {
        $('#first').removeClass('disabled')
        $('#first').data('id', first)
    } else {
        $('#first').addClass('disabled')
    }

    if (links.prev != null) {
        $('#prev').removeClass('disabled')
        let prev = links.prev.replace(replace, '')
        $('#prev').data('id', prev)

        $('#prevCurrent').show()
        $('#prevCurrent span').html(prev)
        $('#prevCurrent').data('id', prev)

        let prevCurrentDouble = prev - 1
        if (prevCurrentDouble > 0) {
            $('#prevCurrentDouble').show()
            $('#prevCurrentDouble span').html(prevCurrentDouble)
            $('#prevCurrentDouble').data('id', prevCurrentDouble)
        } else {
            $('#prevCurrentDouble').hide()
        }
    } else {
        $('#prev').addClass('disabled')
        $('#prevCurrent').hide()
        $('#prevCurrentDouble').hide()
    }

    $('#current').addClass('active')
    $('#current span').html(current)

    if (links.next != null) {
        $('#next').removeClass('disabled')
        let next = links.next.replace(replace, '')
        $('#next').data('id', next)

        $('#nextCurrent').show()
        $('#nextCurrent span').html(next)
        $('#nextCurrent').data('id', next)

        let nextCurrentDouble = ++next
        if (nextCurrentDouble <= meta.last_page) {
            $('#nextCurrentDouble').show()
            $('#nextCurrentDouble span').html(nextCurrentDouble)
            $('#nextCurrentDouble').data('id', nextCurrentDouble)
        } else {
            $('#nextCurrentDouble').hide()
        }
    } else {
        $('#next').addClass('disabled')
        $('#nextCurrent').hide()
        $('#nextCurrentDouble').hide()
    }

    let last = links.last.replace(replace, '')
    if (last != current) {
        $('#last').removeClass('disabled')
        $('#last').data('id', last)
    } else {
        $('#last').addClass('disabled')
    }
    $('#loading').hide()
    $('#pagination').removeClass('none')
    $('#pagination-label').html(`Showing ${meta.from} to ${meta.to} of ${meta.total} entries`)
}

$('.page').click(function() {
    if (!$(this).is('.active, .disabled')) {
        let page = $(this).data('id')
		$('#data').empty()
		$('#loading').show()
        $('#pagination').addClass('none')
        $('#loading_table').removeClass('none')
        get_data(page)
    }
})

function filterPhoneNumber(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value
                this.oldSelectionStart = this.selectionStart
                this.oldSelectionEnd = this.selectionEnd
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd)
            } else {
                this.value = ""
            }
        })
    })
}

function delay(fn, ms) {
    let timer = 0
    return function(...args) {
        clearTimeout(timer)
        timer = setTimeout(fn.bind(this, ...args), ms || 0)
    }
}

function createQR(code) {
    var qrcode = new QRCode(document.getElementById('qrcode'), {
        text: `${root}/detail/${code}`,
        width: 150,
        height: 150,
        colorDark: '#000000',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    })
}

function downloadQR(id) {
    let filename = $('#qrcode' + id).data('filename')
    html2canvas(document.querySelector('#qrcode' + id), {
        scale: 1
    }).then(function(canvas) {
        saveQR(canvas.toDataURL(), filename + '.png')
    })
}

function saveQR(uri, filename) {
    var link = document.createElement('a')
    if (typeof link.download === 'string') {
        link.href = uri
        link.download = filename
        document.body.appendChild(link)
        link.click()
        document.body.removeChild(link)
    } else {
        window.open(uri)
    }
}
