@extends('user.index')
@section('judultitle', 'Detail Buku | User')
@section('konten')

<style>
  .comment-wrapper {
    max-height: 400px;
    overflow-y: auto;
  }
</style>

<div class="container py-4">
  <h3>{{ $book->title }}</h3>
  <p><strong>Genre:</strong> {{ $book->genre->name ?? '-' }}</p>
  <p><strong>Stok:</strong> {{ $book->stok }}</p>
  <p><strong>Summary:</strong></p>
  <p>{{ $book->summary }}</p>

  <hr>
  <h5>Komentar:</h5>
  <div class="comment-wrapper mb-3" id="commentList">
    @forelse ($book->comments as $comment)
      <div class="card mb-2">
        <div class="card-body">
          <h6 class="card-title">{{ $comment->user->name ?? 'User' }}</h6>
          <p class="card-text">{{ $comment->content }}</p>
        </div>
      </div>
    @empty
      <div class="text-muted">Belum ada komentar.</div>
    @endforelse
  </div>

  <form id="commentForm">
    @csrf
    <div class="mb-3">
      <label for="commentText" class="form-label">Tambah Komentar</label>
      <textarea class="form-control" id="commentText" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
  </form>
</div>

<script>
  document.getElementById('commentForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const commentText = document.getElementById('commentText').value.trim();
    if (!commentText) return alert('Komentar tidak boleh kosong.');

    try {
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      const response = await fetch(`/user/books/{{ $book->id }}/comments`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ text: commentText })
      });

      if (!response.ok) throw new Error('Gagal mengirim komentar.');

      const newComment = await response.json();

      const commentList = document.getElementById('commentList');
      if (commentList.querySelector('.text-muted')) {
        commentList.innerHTML = '';
      }

      const wrapper = document.createElement('div');
      wrapper.classList.add('card', 'mb-2');

      const body = document.createElement('div');
      body.classList.add('card-body', 'comment-card');

      const title = document.createElement('h6');
      title.classList.add('card-title', 'mb-1');
      title.textContent = '{{ auth()->user()->name ?? "User" }}';

      const content = document.createElement('p');
      content.classList.add('card-text');
      content.textContent = newComment.text;

      body.appendChild(title);
      body.appendChild(content);
      wrapper.appendChild(body);
      commentList.appendChild(wrapper);

      document.getElementById('commentText').value = '';
    } catch (error) {
      alert(error.message);
    }
  });
</script>
@endsection
