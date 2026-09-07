<x-layouts.app>
    <div class="auth-page">
        <div class="auth-card-wrapper">

            <div class="text-center mb-4">
                <div class="col-12 jumbotron py-4 animate-fade-left">
                    <h1 class="d-flex flex-row justify-content-center align-content-center fw-bold mb-3 text-dark">Re<span class="text-primary">Vibe</span></h1>
                </div>
                <h1 class="h3 fw-bold mb-1">Crea il tuo account</h1>
                <p class="text-muted">Unisciti a ReVibe in pochi secondi</p>
            </div>

            <div class="card auth-card">
                <div class="card-body p-4 p-md-5">

                    <!-- La rotta 'register' è gestita automaticamente da Fortify -->
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="name" name="name"
                                   placeholder="Il tuo nome" value="{{ old('name') }}" required autofocus>
                            <label for="name">Nome</label>
                        </div>
                        @error('name')
                            <div class="alert alert-danger py-2 small rounded-3">{{ $message }}</div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="email" name="email"
                                   placeholder="nome@esempio.com" value="{{ old('email') }}" required>
                            <label for="email">Email</label>
                        </div>
                        @error('email')
                            <div class="alert alert-danger py-2 small rounded-3">{{ $message }}</div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="password" name="password"
                                   placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        @error('password')
                            <div class="alert alert-danger py-2 small rounded-3">{{ $message }}</div>
                        @enderror

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control rounded-3" id="password_confirmation" name="password_confirmation"
                                   placeholder="Conferma password" required>
                            <label for="password_confirmation">Conferma password</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg rounded-3 fw-semibold">Crea Account</button>
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-4 mb-0">
                Hai già un account?
                <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Accedi</a>
            </p>
        </div>
    </div>
</x-layouts.app>