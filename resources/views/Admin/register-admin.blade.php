<!-- register-admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
    <title>Registro de Administrador - Ahorra+</title>
</head>
<body class="dark-mode">
    <header>
        <div class="container">
           <ul>
            <li>
                <a href="/" class="logo">
                    <div class="images">
                        <img src="" class="logo-forDark">
                        <img src="/img/logo.svg" class="logo-forLigth">
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.register') }}" class="nav-link">Registro</a>
            </li>
            <li>
                <a href="{{ route('admin.login') }}" class="nav-link">Inicio de sesión</a>
            </li>
            <li>
                <a href="#" class="nav-link">Acerca de nosotros</a>
            </li>
            <li>
                <span class="nav-link theme-toggle">
                    <i class="fa-solid fa-sun"></i>
                    <i class="fa-solid fa-moon"></i>
                </span>
            </li>
           </ul>
        </div>
    </header>

    <main>
        <section class="contact">
            <div class="container">
                <div class="left">
                    <div class="form-wrapper">
                        <div class="contact-heading">
                            <h1>Crea cuenta Administrador <span>+</span></h1>
                            <p class="text">Si ya tienes cuenta <a href="{{ route('admin.login') }}">Inicia sesión</a></p>
                        </div>

                        <form action="{{ route('admin.register') }}" method="post" class="contact-form">
                            @csrf
                            <div class="input-wrap">
                                <input class="contact-input" autocomplete="off" name="name" type="text" required value="{{ old('name') }}">
                                <label>Nombre</label>
                                <i class="icon fa-solid fa-id-card"></i>
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrap">
                                <input class="contact-input" autocomplete="off" name="lastName" type="text" required value="{{ old('lastName') }}">
                                <label>Apellido</label>
                                <i class="icon fa-solid fa-id-card"></i>
                                @error('lastName')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrap w-100">
                                <input class="contact-input" name="identification" type="number" required value="{{ old('identification') }}">
                                <label>Documento de identidad</label>
                                <i class="icon fa-solid fa-envelope"></i>
                                @error('identification')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrap w-100">
                                <input class="contact-input" autocomplete="off" name="email" type="email" required value="{{ old('email') }}">
                                <label>Email</label>
                                <i class="icon fa-solid fa-envelope"></i>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrap">
                                <input class="contact-input" name="password" type="password" required>
                                <label>Contraseña</label>
                                <i class="icon fa-solid fa-lock"></i>
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-wrap">
                                <input class="contact-input" name="password_confirmation" type="password" required>
                                <label>Confirmación de contraseña</label>
                                <i class="icon fa-solid fa-lock"></i>
                                @error('password_confirmation')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="contact-buttons">
                                <input type="submit" value="Enviar" class="btn">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="right">
                   <div class="image-wrapper">
                    <img src="/img/MOTAAÑA.jpg" class="img">
                    <div class="wave-wrap">
                        <svg class="wave" viewBox="0 0 1609 4086" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_14_7)">
                            <path id="wave" d="M1602.5 1H125.5H5V4077H583.5C866.5 4010.5 1066 3787.5 758.5 3022C451 2256.5 722.5 2123.5 1066 1936.5C1409.5 1749.5 1096 1496.5 891 1020C727 638.8 1297 181.833 1602.5 1Z" />
                            <path id="wave" d="M1602.5 1H125.5H5V4077H583.5C866.5 4010.5 1066 3787.5 758.5 3022C451 2256.5 722.5 2123.5 1066 1936.5C1409.5 1749.5 1096 1496.5 891 1020C727 638.8 1297 181.833 1602.5 1Z" />
                            </g>
                            <defs>
                            <filter id="filter0_d_14_7" x="0.5" y="0.5" width="1607.83" height="4085" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_14_7"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_14_7" result="shape"/>
                            </filter>
                            </defs>
                        </svg>
                    </div>
                   </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="{{ asset('js/registro.js') }}"></script>
</body>
</html>
