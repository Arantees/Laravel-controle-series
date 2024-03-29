<x-layout title="Login">
    <form method="post" class="mt-3">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label text-white">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="form-label text-white">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">Login</button>

        <a href="{{route('users.create')}}" class="btn btn-secondary mt-3">Register</a>
    </form>
</x-layout>