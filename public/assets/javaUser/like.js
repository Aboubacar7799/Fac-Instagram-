
function selectReaction(type, postId) {
    document.getElementById('reaction-type-' + postId).value = type
}

function sendReaction(type, postId) {
    console.log('REACTION', type, postId)

    fetch(window.REACTION_URL, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            post_id: postId,
            type: type
        })
    })
        .then(res => res.json())
        .then(data => {
            console.log('Response', data)

            if (data.success) {
                document.getElementById('counts-' + postId).innerHTML = `
                👍 ${data.counts.like}
                ❤️ ${data.counts.love}
                😢 ${data.counts.sad}
                😡 ${data.counts.angry}
                😮 ${data.counts.wow}
            `;

                const labels = {
                    like: '👍 J’aime',
                    love: '❤️ J’adore',
                    sad: '😢 Triste',
                    angry: '😡 Grrr',
                    wow: '😮 Wouah'
                };

                document.getElementById('btn-' + postId).innerText = labels[data.userReaction];
            }
        })
    .catch(err => console.error(err))
}