<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-indigo-100 min-h-screen flex items-center justify-center">

    <form method="POST" action="{{ route('admin.login.submit') }}"
          class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md space-y-6">
        @csrf

        <h2 class="text-2xl font-bold text-center text-indigo-700">Ingreso Administrador</h2>

        @if($errors->any())
            <div class="text-red-500 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required autofocus
                   class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" required
                   class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-400">
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-semibold">
            Ingresar
        </button>
    </form>

</body>
</html>
