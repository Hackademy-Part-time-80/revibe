<x-layouts.app>
    <div class="auth-page">
        <div class="auth-card-wrapper">

            <div class="text-center mb-4">
                <!-- Logo ReVibe -->
                <div class="col-12 jumbotron py-4 animate-fade-left">
                    <h1 class="d-flex flex-row justify-content-center align-content-center fw-bold mb-3 text-dark">Re<span class="text-primary">Vibe</span></h1>
                </div>
                <h1 class="h3 fw-bold mb-1">Che piacere rivederti!</h1>
                <p class="text-muted">Accedi al tuo account per continuare</p>
            </div>

            <div class="card auth-card">
                <div class="card-body p-4 p-md-5">

                    @error('email')
                        <div class="alert alert-danger py-2 small rounded-3">{{ $message }}</div>
                    @enderror

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="loginEmail" name="email"
                                   placeholder="nome@esempio.com" value="{{ old('email') }}">
                            <label for="loginEmail">Indirizzo email</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control rounded-3" id="password" name="password"
                                   placeholder="Password">
                            <label for="password">Password</label>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input bg-success" type="checkbox" id="remember" name="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label small" for="remember">Ricordami</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 fw-semibold">
                            Accedi
                        </button>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-4 mb-0">
                Non sei registrato?
                <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">Registrati ora</a>
            </p>
        </div>
    </div>
</x-layouts.app>