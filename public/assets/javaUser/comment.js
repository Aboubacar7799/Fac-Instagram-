
$(document).ready(function () {
    $('.comment-form').on('submit', function (e) {
        e.preventDefault();

        let form = $(this);
        let postId = form.data('post-id');
        let content = form.find('input[name="content"]').val();
        let token = form.find('input[name="_token"]').val();

        $.ajax({
            url: "/posts/" + postId + "/comments", // Adapte ta route ici
            method: "POST",
            data: {
                content: content,
                _token: token
            },
            success: function (response) {
                // On ajoute le commentaire dynamiquement à la liste
                $('#comments-lists-' + postId).append(
                    '<div><strong>' + response.username + '</strong> : ' + response.content + '</div>'
                );
                // On vide le champ
                form.find('input[name="content"]').val('');
            },
            error: function () {
                alert("Erreur lors de l'envoi du commentaire");
            }
        });
    });
});


$(document).on('click', '.btn-comment', function () {
    let postId = $(this).data('post-id');
    let anchor = $('#comment-anchor-' + postId);

    console.log('postid', postId)
    console.log('anchor', anchor.length)
    
    if (anchor.length>0) {
        anchor[0].scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
});


// $(document).ready(function () {
//     $('.comment-form').on('submit', function(e){
//         e.preventDefault() ; //  empêche le reload

//         let form = $(this) ;
//         let postId = form.data('post-id') ;
//         let content = form.find('input[name = "content "]').val() ;
//         let token = form.find('input[name = "_token "]').val() ;

//         $.ajax({
//             url: "/posts/" + postId + "/comments",
//             method : "POST",
//             data : {
//             content: content,
//             _token: token
//         },
//             Success : function (response) {
//                 $('#comments-lists-' + postId).append(`
//                     <div class= "mb-2">
//                         <strong>${response.username}</strong>
//                         <div class= "bg-light rounded px-2 py-1 d-inline-block">
//                             ${response.content}
//                         </div>
//                         <div class= "small text-muted">
//                             ${response.created_at}
//                         </div>
//                     </div>
//                 `);

//                 form.find('input[name = "content "]').val('');
//             },
//             error : function () {
//                 alert(" Erreur lors de l'envoi du commentaire ");
//             }
//         });
// });
// });




// function sendComment(postId) {
    
//     let input = document.getElementById('comment-' + postId);
//     fetch("{{ route('comment.ajax') }}", {
//         method: "POST",
//         Headers: {
//             "X-CSRF-TOKEN": "{{ csrf_token() }}",
//             "Content-Type":"application/json"
//         },
//         body: JSON.stringify({
//             post_id: postId,
//             content: input.value
//         })
//     })
//         .then(res => res.json())
//         .then(data => { input.value = ""; })
// }


