<div class="container py-4">
    <div class="row gy-3 align-items-center">
        <div class="col-md-4 text-center text-md-start">
            <div class="d-inline-flex align-items-center gap-2">
                <i class="bi bi-heart-fill"></i>
                <strong>Huellitas Perdidas</strong>
            </div>
            <div class="mt-2 d-flex gap-3 justify-content-center justify-content-md-start">
                <a href="#" class="text-decoration-none"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-decoration-none"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-decoration-none"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="fw-semibold mb-2">Enlaces rápidos</div>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('home') }}" class="link-secondary">Inicio</a>
                <a href="{{ route('extraviados') }}" class="link-secondary">Extraviados</a>
                <a href="{{ route('publicar') }}" class="link-secondary">Reportar</a>
                <a href="{{ route('contacto') }}" class="link-secondary">Contacto</a>
            </div>
        </div>
        <div class="col-md-4 text-center text-md-end">
            <div class="fw-semibold mb-2">Contacto</div>
            <div class="small text-muted">contacto@huellitas.mx</div>
            <div class="small text-muted">961 123 4567</div>
            <div class="small text-muted">Ocosingo, Chiapas</div>
        </div>
    </div>
    <hr class="my-3">
    <p class="small text-center text-muted mb-0">© {{ date('Y') }} Huellitas Perdidas</p>
</div>
