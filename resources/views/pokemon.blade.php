<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería Ultra Vivid Milagros Tapia</title>
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        /* --- 1. FONDO ROSADO DE LUJO --- */
        body {
            background-color: #E0BBE4;
            background: linear-gradient(135deg, #E0BBE4 0%, #D7BDE2 50%, #C39BD3 100%);
            min-height: 100vh;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* --- 2. TÍTULO PERSONALIZADO --- */
        .header-container {
            text-align: center;
            padding: 50px 20px;
            margin-bottom: 30px;
        }

        h1 {
            font-family: 'Cinzel', serif;
            font-weight: 700;
            color: #4A235A;
            font-size: 3.5rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 2px 2px 0px rgba(255, 255, 255, 0.4);
            border-bottom: 2px solid #4A235A;
            display: inline-block;
            padding-bottom: 10px;
        }
        
        .sub-title {
            font-size: 1.2rem;
            color: #4A235A;
            letter-spacing: 6px;
            margin-top: 10px;
            font-weight: 300;
        }

        /* --- 3. TARJETAS DE EXHIBICIÓN (VITRINA) --- */
        .showcase-card {
            background: rgba(255, 255, 255, 0.35);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transform-style: preserve-3d;
            transform: perspective(1000px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .poke-id {
            font-size: 4rem;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.5);
            position: absolute;
            top: 10px;
            left: 20px;
            z-index: 0;
            font-family: 'Cinzel', serif;
        }

        .poke-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2e1035;
            text-transform: uppercase;
            letter-spacing: 3px;
            z-index: 2;
            transform: translateZ(30px);
            margin-bottom: 20px;
        }

        /* --- 4. IMÁGENES "ULTRA REALISTAS" (EL CAMBIO ESTÁ AQUÍ) --- */
        .img-container {
            position: relative;
            margin: 20px 0;
            transform: translateZ(60px);
            transition: transform 0.4s ease;
        }

        .img-main {
            width: 280px;
            height: auto;

            /* --- FILTRO "VIDA EXTREMA" --- */
            /* drop-shadow: Ahora es un resplandor de luz blanca/dorada, no sombra negra. */
            /* saturate(2.2): ¡220% MÁS DE COLOR! Los colores estallan. */
            /* contrast(1.35): Sombras profundas y luces altas para efecto 3D real. */
            /* brightness(1.1): Un toque extra de luz propia. */
            filter: drop-shadow(0 0 30px rgba(255, 255, 220, 0.8)) saturate(2.2) contrast(1.35) brightness(1.1);

            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1); /* Transición dramática */
        }
        
        /* Efecto al pasar el mouse: ¡EXPLOSIÓN DE ENERGÍA! */
        .showcase-card:hover .img-main {
            transform: scale(1.25) translateY(-15px); /* Crecen mucho más */
            
            /* Al pasar el mouse, la saturación llega al 300% y el brillo aumenta */
            filter: drop-shadow(0 0 60px rgba(255, 255, 150, 1)) saturate(3.0) contrast(1.5) brightness(1.3);
        }

        .shiny-mini {
            position: absolute;
            bottom: -20px;
            right: -40px;
            width: 100px;
            /* El shiny también recibe un tratamiento de "vida" */
            filter: drop-shadow(0 0 25px rgba(255, 215, 0, 0.9)) saturate(2.5) contrast(1.3);
            opacity: 1;
        }

        .label-text {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #4A235A;
            margin-top: 10px;
            opacity: 0.8;
            font-weight: bold;
        }

    </style>
</head>
<body>

    <div class="container mt-4">
        
        <div class="header-container">
            <h1>POKEMON</h1>
            <div class="sub-title">BY ALUMNA MILAGROS TAPIA QUISPE</div>
        </div>

        <div class="row justify-content-center">
            
            @foreach($LocalPokemon as $p )
            <div class="col-lg-6 col-md-12"> 
                
                <div class="showcase-card" data-tilt data-tilt-glare data-tilt-max-glare="0.5" data-tilt-scale="1.05">
                    
                    <div class="poke-id">{{ str_pad($p->id, 3, '0', STR_PAD_LEFT) }}</div>
                    
                    <div class="poke-name">{{ $p->name }}</div>
                    
                    <div class="img-container">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{{ $p->id }}.png" 
                             alt="{{ $p->name }}" class="img-main">
                             
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/shiny/{{ $p->id }}.png" 
                             alt="Shiny" class="shiny-mini" title="Versión Shiny">
                    </div>

                    <div class="label-text">Visualización Ultra Vivid HDR</div>

                </div>
            </div>
            @endforeach

        </div>
        
        <br><br>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".showcase-card"), {
            max: 12,
            speed: 400,
            glare: true,
            "max-glare": 0.3,
        });
    </script>

</body>
</html>