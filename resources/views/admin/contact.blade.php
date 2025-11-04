@extends('admin.admin')
@section('content')
<div class=" flex-grow-1 ">    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <h1 class="h2 mb-0 ls-tight">Messages</h1>
        </div>
    </header>

    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="card shadow border-0 mb-7">
                <div class="card-header">
                    <h5 class="mb-0">Messages</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                                <tr id="contact-{{ $contact->id }}">
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-end mark-read-cell">
                                        <button 
                                            class="btn btn-sm btn-info view-message" 
                                            data-content="{{ $contact->content }}">
                                            View
                                        </button>

                                        @if (!$contact->is_read)
                                            <button 
                                                class="btn btn-sm btn-neutral mark-read" 
                                                data-id="{{ $contact->id }}">
                                                Mark as Read
                                            </button>
                                        @else
                                            <span class="badge bg-success">Read</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No messages found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // MARK AS READ
    const buttons = document.querySelectorAll('.mark-read');
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const token = document.querySelector('meta[name="csrf-token"]').content;

            fetch(`/admin/contacts/${id}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const row = document.getElementById(`contact-${id}`);
                    const actionCell = row.querySelector('td.mark-read-cell');
                    // Keep the View button, replace Mark as Read with "Read"
                    const viewBtn = actionCell.querySelector('.view-message').outerHTML;
                    actionCell.innerHTML = viewBtn + ' <span class="badge bg-success">Read</span>';
                }
            })
            .catch(err => console.error(err));
        });
    });

    // VIEW MESSAGE MODAL
    const viewButtons = document.querySelectorAll('.view-message');
    const modal = new bootstrap.Modal(document.getElementById('messageModal'));
    const modalContent = document.getElementById('modalContent');

    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            modalContent.textContent = this.dataset.content;
            modal.show();
        });
    });
});
</script>
@endsection
