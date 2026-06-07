<footer class="bg-dark mt-5 mb-0 pt-4 px-1">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-lg-6">
                <a href="{{ $brand }}" class="text-white text-decoration-none d-flex align-items-center mb-3 fw-bold fs-4">
                    <i class="bi bi-bus-front-fill me-2"></i>
                    BusKu
                </a>
                <p class="text-break text-white-50 small">BusKu adalah solusi digital untuk pemesanan tiket bus yang membantu penumpang menemukan jadwal, rute, dan tiket perjalanan dengan mudah. Kami berkomitmen memberikan layanan transportasi yang praktis, efisien, dan terpercaya bagi setiap pengguna.</p>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="mb-3 text-white fw-bold">LINK CEPAT</h6>
                <ul class="list-unstyled">
                    @foreach ($links as $link)
                        <li class="mb-1">
                            <a class=" footer-link text-white-50 text-decoration-none small" href="{{ $link['url'] }}">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="mb-3 fw-bold small text-white">KONTAK KAMI</h6>
                <p class="text-white-50 small mb-2"><i class="bi bi-telephone me-1"></i>+62 85236117737</p>
                <p class="text-white-50 small mb-0 text-break"><i class="bi bi-envelope me-1 "></i>busku@gmail.com</p>
            </div>
        </div>
        <hr class="my-1 border-light">
        <div class="text-center py-3 text-white-50 small">&copy; By BusKu @2026</div>
    </div>
</footer>