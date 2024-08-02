<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorra +</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="content">
            <div class="menu container">
                <a href="html/index.html" class="logo">
                    <div class="images">
                        <img src="/img/logo.svg" class="logo-for" title="Ahorramas">
                        <!-- <img src="/img/logo.svg" class="logo-forLight" title="Ahorramas"> -->
                    </div>
                </a>
                <input type="checkbox" id="menu"/>
                <label for="menu">
                    <img src="/img/menu.png" class="menu-icono" alt="">
                </label>
        
                <nav class="navbar">
                    <ul>
                        <li><a>Acerca de Nosotros</a></li>
                        <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <li><a href="{{ route('register') }}">Registrarse</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <div class="header-content container">
            <div class="header-img">
                <img src="/img/gota.jfif" alt="">
            </div>
            <div class="header-txt">
                <p>
                    Pequeños cambios generan grandes resultados en el futuro.
                    Así se debe mirar el consumo consciente, que empezando poco a poco y con cambios no tan radicales, los resultados serán estupendos en el futuro.
                </p>
            </div>
        </div>
    </header>
    <br>
    <!-- simulador -->
    <div class="simulador-content container">
        <div class="simulador-txt">
            <h2 class="titulo">Simulador de Tarifa</h2>
            <p>Calcula tu presupuesto mensual de agua potable y planifica un ahorro mensual.</p>
        </div>
        <div class="simulador-img">
            <img src="/img/tarifa.png" alt="">
        </div>
        <div class="input-group">
            <form class="form-simulador">
                <h2>Selecciona tus datos de servicio</h2>
                <label for="tipo-servicio">Tipo de servicio:</label>
                <select id="tipo-servicio">
                    <option value="agua">Solo Agua</option>
                    <option value="agua-alcan">Agua y Alcantarillado</option>
                </select>
                <label class="menu1" for="categoria">Categoría:</label>
                <select id="categoria">
                    <option value="Domestico">Doméstico</option>
                    <option value="comercial">Comercial</option>
                    <option value="industrial">Industrial</option>
                </select>
                <label for="estrato">Estrato:</label>
                <select id="estrato">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <label for="volumen">Volumen de consumo:</label>
                <input type="number" id="volumen" placeholder="Ingresa el volumen en m3">
                <button type="submit" class="btn-calcular">Calcular</button>
            </form>
        </div>
    </div>
    <!-- imagenes informativas -->
    <section class="blog container">
        <img src="/img/gotaagua.png.crdownload" alt="">
        <h2>El agua es un recurso vital e indispensable para la vida humana y animal, sin embargo, su acceso no es ilimitado y está en peligro debido al cambio climático, la contaminación y el mal uso.</h2>
        <hr>
        <div class="blog-content">
            <div class="blog-1 h-100">
                <img src="/img/fuga.jpg" alt="">
                <h3>REVISA Y REPARA LAS FUGAS</h3>
                <p>Las fugas en las tuberías y los grifos pueden parecer insignificantes, pero representan un gran desperdicio de agua. Según estudios, una fuga que pierde una gota por segundo puede generar hasta 20 litros de agua por día.</p>
            </div>
            <div class="blog-1 h-100">
                <img src="/img/usodeagua.jpg" alt="">
                <h3>USA EL AGUA CON MODERACIÓN</h3>
                <p>El uso excesivo del agua en las actividades diarias como lavar platos, lavar ropa, bañarse o regar las plantas, puede causar un gran desperdicio de agua. Es importante utilizar solo la cantidad de agua necesaria para realizar estas tareas.</p>
            </div>
            <div class="blog-1 h-100">
                <img src="/img/Reutilizar.jpg" alt="">
                <h3>RECICLA Y REUTILIZA EL AGUA</h3>
                <p>El reciclaje y reutilización del agua son formas efectivas de reducir su consumo y desperdicio. En el hogar, podemos utilizar el agua de lluvia para regar las plantas o el jardín, o recolectar el agua de la ducha mientras esperamos que salga caliente para utilizarla en la limpieza.</p>
            </div>
        </div>
    </section>
    <hr>
    <!-- Quienes somos -->
    <div class="nosotros-content container">
        <div class="nosotros-txt">
            <h2 class="titulo">¿Quiénes Somos?</h2>
            <p>Ahorra + permite a los usuarios monitorear y controlar su consumo de agua actual, proporcionando una serie de herramientas útiles para monitorear el consumo de agua, tener un mejor control sobre los gastos y prevenir posibles problemas relacionados con la fuga de agua.</p>
            <div class="simulador-img">
                <img src="/img/gotaagua.png" alt="">
            </div>
        </div>
        <form class="nosotros-form" action="https://formsubmit.co/lnmanquillo@soy.sena.edu.co" method="POST">
            <h2>Contacto</h2>
            <div class="input-group">
                <label for="name">Nombre</label>
                <input class="caja" type="text" name="name" id="name" placeholder="Nombre">
                <label for="phone">Teléfono</label>
                <input class="caja" type="tel" name="phone" id="phone" placeholder="Teléfono">
                <label for="email">Email</label>
                <input class="caja" type="email" name="email" id="email" placeholder="Email">
                <label for="message">Mensaje</label>
                <textarea class="caja" name="message" id="message" placeholder="Escribe aquí tu mensaje"></textarea>
            </div>
            <button class="btn-salvar" type="submit">Enviar</button>
        </form>
    </div>
    <br>
    <footer>
        <div class="footer-content container">
            <div class="footer-social">
                <a href="#" alt=""><img src="/img/facebook.png" style="width:40px;"></a>
                <a href="#" alt=""><img src="/img/instagram.png" style="width: 40px;"></a>
                <a href="#" alt=""><img src="/img/youtube.png" style="width: 40px;"></a>
            </div>
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Contadores</a></li>
                    <li><a href="#">Historial</a></li>
                    <li><a href="#">Daños</a></li>
                    <li><a href="#">Acerca de Nosotros</a></li>
                    <li><a href="#">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer-bottom container">
            <p>© 2023 Ahorra +. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="{{ asset('js/inicio.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Wg30pq1+5zGH2SiRU/C1P9IB4V+6f5aDtwPfFToOwH88x3w2GJU5OfdBj+jTouPr" crossorigin="anonymous"></script>
</body>
</html>
