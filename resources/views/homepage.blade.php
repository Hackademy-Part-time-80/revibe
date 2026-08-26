<x-layouts.app>
<div class="container d-flex justify-content-center align-items-center vh-100">
        
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Accedi</h3>

            <form action="{{ route('login') }}" method="POST">
                <!-- La direttiva CSRF è obbligatoria in Laravel per i form POST -->
                @csrf

                <!-- Campo Email -->
                <div class="mb-3 text-center">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control text-center" id="email" name="email" required autofocus>
                </div>

                <!-- Campo Password -->
                <div class="mb-4 text-center">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control text-center" id="password" name="password" required>
                </div>

                <!-- Bottone di Accesso -->
                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-primary">Entra</button>
                </div>

                
                <!-- Sezione Registrati -->
                <div class="text-center mt-4">
                    <span class="text-muted" style="font-size: 0.9rem;">Non hai un account?</span>
                    <div class="d-grid mt-1">
                        
                        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-secondary">Registrati</a>
                    </div>
                </div>
            </form>
            
            
        </div>
    </div>
</x-layouts.app>