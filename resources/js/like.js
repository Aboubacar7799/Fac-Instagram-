const forms = document.querySelectorAll('#form-js');

forms.forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const url = this.getAttribute('action'); //console.log(url);
        const token = document.querySelector('meta[name="csrf-token"]').content; //console.log(token);
        const count = this.querySelector('#count-js'); //console.log(count)
        const postId = this.querySelector('#post-id-js').value;//console.log(postId);

        fetch(url, {
            headers: {
                'content-type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            method: 'post',
            body: JSON.stringify({
                id: postId
            })
        }).then(response => {
            response.json().then(data => {
                count.innerHTML = data.count + ' Like(s)';
                // console.log(data);
            })
        }).catch(error => {
                console.log(error)
        });
    });
});