// resources/js/comment-reactions.js
export function initCommentReactions() {
    const reactButtons = document.querySelectorAll('.react-btn');
    
    // Exit if no reaction buttons exist
    if (reactButtons.length === 0) return;

    reactButtons.forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.dataset.id;
            const reaction = this.dataset.reaction;

            const likeSpan = document.getElementById(`likes-${commentId}`);
            const dislikeSpan = document.getElementById(`dislikes-${commentId}`);
            
            if (!likeSpan || !dislikeSpan) return;

            fetch(`/comments/${commentId}/react`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ reaction })
                })
                .then(response => response.json())
                .then(data => {
                    likeSpan.textContent = data.likes;
                    dislikeSpan.textContent = data.dislikes;

                    const parent = this.closest('.comment-reactions');
                    parent.querySelectorAll('.react-btn').forEach(btn => {
                        btn.classList.remove('btn-primary', 'btn-danger');
                        btn.classList.add(btn.dataset.reaction === 'like' ? 'btn-outline-primary' : 'btn-outline-danger');
                    });

                    if (data.status === 'added') {
                        if (reaction === 'like') {
                            this.classList.remove('btn-outline-primary');
                            this.classList.add('btn-primary');
                        } else {
                            this.classList.remove('btn-outline-danger');
                            this.classList.add('btn-danger');
                        }
                    }
                })
                .catch(console.error);
        });
    });
}
