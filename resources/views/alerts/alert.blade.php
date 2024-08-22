@session('success_message')
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        <i class="bi bi-check-circle"></i>
        <strong>Success!</strong> {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession

@session('error_message')
    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
        <i class="bi bi-check-circle"></i>
        <strong>Error!</strong> {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession
