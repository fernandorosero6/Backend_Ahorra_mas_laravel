<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="modal.css">
</head>
<body>
    <div class="w-screen h-screen bg-white sm:bg-gray-20 relative flex m-0 p-0">
        <div class="w-1/2 h-full relative flex justify-end">
            <img class="w-full h-full object-cover z-0" src="/img/pexels-rifkyilhamrd-788200.jpg" alt="">
            <img class="object-cover absolute h-full justify-end z-50" src="/img/plantilla.svg" alt="">
        </div>

        <div class="py-6 relative w-full h-screen sm:w-7/12 md:w-6/12 lg:w-4/12 m-auto">
            <div class="bg-white rounded py-2 px-6 flex flex-col justify-center">
                <div class="mb-4">
                    <h1 class="text-center font-sans font-bold pt-4 pb-8">INICIAR SESIÓN</h1>
                    <form action="{{ route('login') }}" method="POST" class="space-y-4 flex flex-col">
                        @csrf
                        <div class="relative flex justify-center">
                            <input
                                placeholder="Correo o Documento"
                                type="text"
                                class="rounded bg-gray-100 border-2 border-gray-300"
                                name="email" required autofocus autocomplete="username"
                            />
                        </div>
                        <div class="relative flex justify-center">
                            <input
                                placeholder="Contraseña"
                                type="password"
                                class="rounded bg-gray-100 border-2 border-gray-300"
                                name="password" required autocomplete="current-password"
                            />
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="w-52 text-white bg-[#B0D892] hover:bg-green-600 font-medium rounded-lg text-sm py-2.5 text-center">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>

                <a href="{{ route('password.request') }}" class="hover:text-blue-500 hover:underline text-center">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="bg-white rounded mt-2 pb-2 px-6 flex flex-col justify-center">
                <div class="mb-4">
                    <h1 class="text-center font-sans font-bold pt-4 pb-8">Perfiles Activos</h1>
                    <div class="flex gap-2 justify-evenly">
                        <div class="w-1/3 h-1/2 hover:scale-110 text-center">
                            <a href="/html/InicioDeSesionAlexandra.html">
                                <img class="rounded-3xl object-cover h-24" src="/img/chica.jpg" alt="">
                                <h5>Alexandra Pacheco</h5>
                            </a>
                        </div>
                        <div class="w-1/3 text-center hover:scale-110">
                            <a href="/html/InicioDeSesionSalomon.html">
                                <img class="rounded-3xl object-cover h-24" src="/img/el-fenomeno-mundial-feid-y-los-detalles-para-asistir-a-su-concierto-1094841.jpg" alt="">
                                <h5>Salomon Villa</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <span class="text-center">¿No tienes una cuenta? <a class="font-bold text-[#B0D892] hover:underline hover:text-green-500" href="{{ route('register') }}">Regístrate aquí</a></span>
            </div>
        </div>
        <header class="py-4 mr-4 flex-col justify-end">
            <a href="/">
                <img class="w-10" src="/img/logo.svg" alt="logo">
            </a>
        </header>
    </div>
</body>
</html>
