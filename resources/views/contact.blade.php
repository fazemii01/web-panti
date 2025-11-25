<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .loading { display: none; }
        .error-message { display: none; color: red; }
        .sent-message { display: none; color: green; }
    </style>
</head>
<body>

<form action="/contact" method="post" class="php-email-form mt-4">
    @csrf
    <div class="row gy-4">
        <div class="col-md-6">
            <input type="text" name="nama" class="form-control" placeholder="Nama" required />
        </div>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" placeholder="Email" required />
        </div>
        <div class="col-md-12">
            <input type="text" class="form-control" name="subjek" placeholder="Subjek" required />
        </div>
        <div class="col-md-12">
            <textarea class="form-control" name="Pesan" rows="6" placeholder="Pesan" required></textarea>
        </div>
        <div class="col-md-12 text-center">
            <div class="loading">Memuat...</div>
            <div class="error-message"></div>
            <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>
            <button type="submit">Mengirim pesan</button>
        </div>
    </div>
</form>

<script>
document.querySelector('.php-email-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let form = this;
    let formData = new FormData(form);
    let loading = document.querySelector('.loading');
    let errorMessage = document.querySelector('.error-message');
    let sentMessage = document.querySelector('.sent-message');

    loading.style.display = 'block';
    errorMessage.style.display = 'none';
    sentMessage.style.display = 'none';

    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        loading.style.display = 'none';
        if (data.message === 'Pesan Anda telah dikirim. Terima kasih!') {
            sentMessage.style.display = 'block';
            form.reset();
        } else {
            errorMessage.style.display = 'block';
            errorMessage.innerHTML = data.message;
        }
    })
    .catch(error => {
        loading.style.display = 'none';
        errorMessage.style.display = 'block';
        errorMessage.innerHTML = 'Terjadi kesalahan, silakan coba lagi nanti.';
    });
});
</script>

</body>
</html>
