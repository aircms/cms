import '@coreui/coreui'

$(function () {

  $('body').on('click', '.load-field-demo', function (e) {
    e.preventDefault()

    let url = $('.load-field-demo').
      attr('data-url').
      replace('--demo--', $('#type').val())

    console.log('url:', url)
    axios.get(url).then(function (response) {
      console.log(response)
      $("#configure").val(response.data.string)
    }).catch(function (error) {
      console.error(error)
    })

    return false
  })
})
