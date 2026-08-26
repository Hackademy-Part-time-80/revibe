<x-layouts.app>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        
        <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
            <h3 class="text-center mb-4">Registrati</h3>

            <!-- La rotta 'register' è gestita automaticamente da Fortify -->
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Campo Nome -->
                <div class="mb-3 text-center">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control text-center" id="name" name="name" required autofocus>
                </div>

                <!-- Campo Email -->
                <div class="mb-3 text-center">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control text-center" id="email" name="email" required>
                </div>

                <!-- Campo Password -->
                <div class="mb-3 text-center">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control text-center" id="password" name="password" required>
                </div>

                <!-- Campo Conferma Password -->
                <div class="mb-4 text-center">
                    <label for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" class="form-control text-center" id="password_confirmation" name="password_confirmation" required>
                </div>

                <!-- Bottone di Registrazione -->
                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-success">Crea Account</button>
                </div>
                
                <!-- Link per tornare al Login -->
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none" style="font-size: 0.9rem;">Hai già un account? Accedi</a>
                </div>
            </form>
            
        </div>
    </div>
</x-layouts.app>