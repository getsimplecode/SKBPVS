<style>
    .alert-pos {
    position: relative;
    overflow: hidden;
    border-radius: 14px;
    animation: slideIn 0.4s ease forwards;
    backdrop-filter: blur(6px);
}

.alert-pos .icon-box {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.alert-pos .progress-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    background: rgba(255,255,255,.7);
    animation: progress 5s linear forwards;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(100%);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes progress {
    from { width: 100%; }
    to { width: 0%; }
}

</style>

<div id="alert-container"
     class="position-fixed top-0 end-0 p-3"
     style="z-index: 2000; width: 360px;">

    {{-- SUCCESS --}}
    @if (session('success'))
        <div class="alert alert-success alert-pos shadow border-0 mb-2">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-success">
                    <i class="fas fa-check"></i>
                </div>
                <div class="ms-3 flex-grow-1">
                    <div class="fw-bold">Process Successful</div>
                    <small>{{ session('success') }}</small>
                </div>
                <button class="btn-close ms-2" data-bs-dismiss="alert"></button>
            </div>
            <div class="progress-bar"></div>
        </div>
    @endif

    {{-- ERROR --}}
    @if (session('error'))
        <div class="alert alert-danger alert-pos shadow border-0 mb-2">
            <div class="d-flex align-items-center">
                <div class="icon-box bg-danger">
                    <i class="fas fa-times"></i>
                </div>
                <div class="ms-3 flex-grow-1">
                    <div class="fw-bold">Something went wrong</div>
                    <small>{{ session('error') }}</small>
                </div>
                <button class="btn-close ms-2" data-bs-dismiss="alert"></button>
            </div>
            <div class="progress-bar bg-danger"></div>
        </div>
    @endif

    {{-- VALIDATION --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-pos shadow border-0 mb-2">
            <div class="d-flex align-items-start">
                <div class="icon-box bg-danger mt-1">
                    <i class="fas fa-exclamation"></i>
                </div>
                <div class="ms-3 flex-grow-1">
                    <div class="fw-bold">Please check the form</div>
                    <ul class="small ps-3 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="btn-close ms-2" data-bs-dismiss="alert"></button>
            </div>
            <div class="progress-bar bg-danger"></div>
        </div>
    @endif

</div>
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert-pos').forEach(alert => {
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 300);
        });
    }, 5000);
</script>
