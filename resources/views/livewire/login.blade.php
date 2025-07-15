<div class="container d-flex justify-content-center align-items-center vh-100">
    
    <div class="card p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h1 class="text-center mb-4" style="color:blue;">LIVEWIRE CRUD</h1>
        <h3 class="text-center mb-4">Login</h3>
        
        <form wire:submit.prevent="authenticate">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    class="form-control @error('username') is-invalid @enderror" 
                    wire:model="username"
                >
                @error('username')
                        {{ $message }}
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    wire:model="password"
                >
                @error('password')
                        {{ $message }}
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="reset" class="btn btn-outline-secondary">Clear</button>
                <a href="{{ route('register') }}" wire:navigate>Create an account</a>
            </div>
        </form>
    </div>
</div>
