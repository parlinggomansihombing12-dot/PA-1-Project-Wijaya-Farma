@extends('layouts.main')

@section('content')

<style>
body {
    background-color: #f3f4f6;
}

/* warna utama */
.teks-hijau {
    color: #14B8A6;
}

/* form */
.form-card {
    border-radius: 18px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* card testimoni */
.card-testimoni {
    border: none;
    border-radius: 18px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.card-testimoni:hover {
    transform: translateY(-6px);
}

/* bintang */
.bintang {
    color: #fbbf24;
    font-size: 1.2rem;
}

/* button */
.btn-hijau {
    background-color: #14B8A6;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 8px 20px;
    transition: 0.3s;
}

.btn-hijau:hover {
    background-color: #0f9f8f;
}

/* rating */
.rating input {
    display: none;
}

.rating label {
    font-size: 1.5rem;
    color: #ccc;
    cursor: pointer;
    transition: 0.2s;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #fbbf24;
}
</style>

<div class="container py-5">

    <!-- JUDUL -->
    <h2 class="text-center fw-bold teks-hijau mb-5">
        💬 Apa Kata Pelanggan Kami?
    </h2>

    <!-- FORM -->
    <div class="card form-card p-4 mb-5 mx-auto" style="max-width:600px;">
        <h5 class="fw-bold mb-3 teks-hijau">Tambah Ulasan</h5>

        <form action="{{ route('testimoni.store') }}" method="POST">
            @csrf

            <input type="text" 
                   name="nama_pelanggan" 
                   class="form-control mb-3" 
                   placeholder="Nama" required>

            <textarea name="komentar" 
                      class="form-control mb-3" 
                      rows="3" 
                      placeholder="Tulis ulasan..." required></textarea>

            <!-- RATING -->
            <div class="mb-3 text-center">
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                    <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                    <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-hijau">
                    Kirim Testimoni
                </button>
            </div>

        </form>
    </div>

    <!-- LIST TESTIMONI -->
    <div class="row justify-content-center">

        @forelse($list_testimoni as $item)
        <div class="col-md-4 mb-4 d-flex justify-content-center">

            <div class="card card-testimoni text-center p-4" style="max-width:350px; width:100%;">

                <!-- BINTANG -->
                <div class="mb-3 bintang">
                    @for($i = 1; $i <= ($item->rating ?? 0); $i++)
                        ★
                    @endfor
                </div>

                <!-- KOMENTAR -->
                <p class="fst-italic text-muted">
                    "{{ $item->komentar }}"
                </p>

                <hr>

                <!-- NAMA -->
                <h6 class="fw-bold">
                    {{ $item->nama_pelanggan }}
                </h6>

            </div>

        </div>

        @empty
        <div class="text-center">
            <p class="text-muted">Belum ada testimoni</p>
        </div>
        @endforelse

    </div>

</div>

@endsection