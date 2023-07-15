console.log('custom js')

jQuery.post(wp_todo_plugin.ajax_url, {
    nonce: wp_todo_plugin.nonce,
    action: 'wp_todo_abc',
    name: 'John',
    cars: ['Audi', 'BMW'],
    postId: 123
})
    .then((response) => {
        console.log(response.data.message)
    })

    .catch((error) => {
        console.log(error)
    })


jQuery.post(wp_todo_plugin.ajax_url, {
    action: 'wp_todo_abc_again'
})
    .then((response) => {
        console.log(response)
    })

    .catch((error) => {
        console.log(error)
    })
