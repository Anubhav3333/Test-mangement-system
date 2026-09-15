@extends('layouts.dashboard')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-lg-7 col-xl-6">

            <div class="card border-0 shadow rounded-4 overflow-hidden">

               <!-- Header  -->
                <div class="bg-primary text-white text-center p-3">

                    <div class="mb-2">
                        <span class="d-inline-flex align-items-center justify-content-center
                                     bg-white text-primary rounded-circle"
                              style="width: 45px; height: 45px;">
                            <i class="bi bi-chat-dots-fill fs-5"></i>
                        </span>
                    </div>

                    <h4 class="fw-bold mb-1">
                        Have a Question?
                    </h4>

                    <p class="mb-0 small opacity-75">
                        Send us your question or doubt.
                    </p>

                </div>

                 <!-- Form  -->
                <div class="card-body p-3 p-md-4">

                    <form action="{{ route('contact.store') }}"
                          method="POST"
                          id="contactForm">

                        @csrf

                        <div class="row g-3">

                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold mb-1">
                                    <i class="bi bi-person me-1"></i>
                                    Name
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control rounded-3"
                                       placeholder="Enter your name"
                                       required>
                            </div>

                            <!-- Email  -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold mb-1">
                                    <i class="bi bi-envelope me-1"></i>
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control rounded-3"
                                       placeholder="Enter your email"
                                       required>
                            </div>

                             <!-- Subject -->
                            <div class="col-12">
                                <label class="form-label fw-semibold mb-1">
                                    <i class="bi bi-chat-square-text me-1"></i>
                                    Subject
                                </label>

                                <input type="text"
                                       name="subject"
                                       class="form-control rounded-3"
                                       placeholder="What is your question about?"
                                       required>
                            </div>

                            <!-- Message  -->
                            <div class="col-12">
                                <label class="form-label fw-semibold mb-1">
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Your Question
                                </label>

                                <textarea name="message"
                                          class="form-control rounded-3"
                                          rows="4"
                                          placeholder="Write your question here..."
                                          required></textarea>
                            </div>

                            <!-- Button  -->
                            <div class="col-12 text-center pt-1">

                                <button type="submit"
                                        class="btn btn-primary rounded-pill px-4 fw-semibold">

                                    <i class="bi bi-send-fill me-2"></i>
                                    Send Question

                                </button>

                            </div>

                        </div>

                    </form>

                </div>
            </div>

            <div class="text-center mt-2 text-muted small">
                <i class="bi bi-shield-check me-1"></i>
                Your information is safe with us.
            </div>

        </div>
    </div>

</div>
@section('content')
@endsection


<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {

    e.preventDefault();

    Swal.fire({
        icon: 'success',
        title: 'Question Submitted!',
        text: 'Your question has been submitted successfully.',
        confirmButtonText: 'OK',
        confirmButtonColor: '#0d6efd'
    }).then(() => {
        this.submit();
    });

});
</script>