<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABORATORIO POKÉMON - Milagros Tapia</title>
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@500;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <style>
        /* --- 0. CURSOR LÁSER (SE MANTIENE PORQUE ES GENIAL) --- */
        body { cursor: none; }
        .custom-cursor { position: fixed; width: 40px; height: 40px; border: 1px solid #00f3ff; border-radius: 50%; pointer-events: none; transform: translate(-50%, -50%); z-index: 9999; transition: width 0.2s, height 0.2s; box-shadow: 0 0 10px #00f3ff; }
        .cursor-dot { position: fixed; width: 6px; height: 6px; background: #ff00de; border-radius: 50%; pointer-events: none; transform: translate(-50%, -50%); z-index: 10000; }

        /* --- 1. FONDO GENERAL (EL LABORATORIO) --- */
        body {
            background-color: #020205;
            /* Un fondo más oscuro y "metálico" */
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(0, 243, 255, 0.05) 0%, transparent 60%),
                repeating-linear-gradient(90deg, rgba(255, 255, 255, 0.03) 0px, rgba(255, 255, 255, 0.03) 1px, transparent 1px, transparent 40px),
                repeating-linear-gradient(0deg, rgba(255, 255, 255, 0.03) 0px, rgba(255, 255, 255, 0.03) 1px, transparent 1px, transparent 40px);
            min-height: 100vh;
            font-family: 'Rajdhani', sans-serif;
            overflow-x: hidden;
            perspective: 1500px;
        }

        .header-container { text-align: center; padding: 60px 20px; margin-bottom: 20px; }
        h1 { font-family: 'Orbitron', sans-serif; font-weight: 900; color: #fff; font-size: 3.5rem; text-transform: uppercase; letter-spacing: 10px; text-shadow: 0 0 10px #00f3ff, 0 0 30px #00f3ff; margin-bottom: 10px; }
        .sub-title { font-family: 'Share Tech Mono', monospace; font-size: 1.2rem; color: #ff00de; letter-spacing: 4px; text-transform: uppercase; border: 1px solid #ff00de; display: inline-block; padding: 5px 20px; background: rgba(255, 0, 222, 0.1); }

        /* --- 2. TARJETA (CÁMARA DE CONTENCIÓN) --- */
        .flip-card { background-color: transparent; width: 100%; height: 580px; perspective: 1500px; margin-bottom: 50px; }
        .flip-card-inner { position: relative; width: 100%; height: 100%; text-align: center; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); transform-style: preserve-3d; }
        .flip-card:hover .flip-card-inner { transform: rotateY(180deg); }

        .flip-card-front, .flip-card-back {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            -webkit-backface-visibility: hidden; backface-visibility: hidden;
            border: 2px solid rgba(0, 243, 255, 0.3); /* Borde más grueso de energía */
            clip-path: polygon(20px 0, 100% 0, 100% calc(100% - 20px), calc(100% - 20px) 100%, 0 100%, 0 20px);
            box-shadow: 0 0 30px rgba(0, 243, 255, 0.1);
            overflow: hidden;
        }

        /* --- FRENTE: EL LABORATORIO --- */
        .flip-card-front {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            background: rgba(10, 15, 25, 0.9); /* Fondo oscuro de la cámara */
        }

        /* Detalles del laboratorio en el frente */
        .lab-header-bar {
            position: absolute; top:0; left:0; width:100%; height: 30px;
            background: rgba(0, 243, 255, 0.15);
            border-bottom: 1px solid #00f3ff;
            display: flex; align-items: center; padding-left: 15px;
            font-family: 'Share Tech Mono'; color: #00f3ff; font-size: 0.8rem; letter-spacing: 2px;
        }
        .lab-footer-bar {
            position: absolute; bottom:0; left:0; width:100%; padding: 10px;
            text-align: center; font-family: 'Share Tech Mono'; color: #00ff00; /* Verde de estado OK */
            text-shadow: 0 0 5px #00ff00; letter-spacing: 3px; font-size: 0.9rem;
        }

        /* Escáner */
        .scanner-line { position: absolute; top: 0; left: 0; width: 100%; height: 3px; background: #00f3ff; box-shadow: 0 0 10px #00f3ff, 0 0 20px #00f3ff; opacity: 0.8; animation: scan 3s linear infinite; z-index: 10; }
        @keyframes scan { 0% { top: 0%; opacity: 0; } 50% { opacity: 1; } 100% { top: 100%; opacity: 0; } }

        /* Imagen */
        .img-main {
            width: 260px; margin-top: 20px;
            filter: drop-shadow(0 0 25px rgba(0, 243, 255, 0.4)) hue-rotate(0deg) saturate(1.5); /* Brillo azulado de contención */
            animation: holoFloat 4s ease-in-out infinite; z-index: 2;
        }
        @keyframes holoFloat { 0%, 100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-10px) scale(1.02); } }

        .poke-name { font-family: 'Orbitron', sans-serif; font-size: 2.2rem; color: #fff; text-transform: uppercase; letter-spacing: 4px; position: relative; z-index: 5; margin-top: 10px; }

        /* --- DORSO: DATOS --- */
        .flip-card-back {
            background: rgba(5, 5, 10, 0.95); transform: rotateY(180deg);
            display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 30px;
            box-shadow: 0 0 30px rgba(0, 243, 255, 0.2) inset;
        }
        .data-row { display: flex; justify-content: space-between; width: 100%; margin-bottom: 15px; position: relative; z-index: 2; border-bottom: 1px dashed rgba(255,255,255,0.2); padding-bottom: 5px; }
        .data-label { color: #888; font-family: 'Share Tech Mono'; font-size: 0.9rem; }
        .data-value { color: #fff; font-family: 'Orbitron'; font-weight: bold; text-shadow: 0 0 5px #fff; }
        .cyber-bar-container { width: 100%; background: #333; height: 6px; margin-bottom: 20px; relative; z-index: 2; }
        .cyber-bar { height: 100%; background: #ff00de; box-shadow: 0 0 10px #ff00de; }
        .holo-btn { margin-top: 10px; padding: 10px 30px; border: 1px solid #00f3ff; color: #00f3ff; font-family: 'Orbitron'; text-transform: uppercase; letter-spacing: 2px; background: rgba(0, 243, 255, 0.1); position: relative; z-index: 2; }

    </style>
</head>
<body>

    <div class="custom-cursor" id="cursor-ring"></div>
    <div class="custom-cursor" style="width: 6px; height: 6px; background: #ff00de; border: none; box-shadow: 0 0 10px #ff00de;" id="cursor-dot"></div>

    <div class="container mt-4">
        
        <div class="header-container">
            <h1>CENTRO DE INVESTIGACIÓN</h1>
            <div class="sub-title">/// UNIDAD DE BIO-GENÉTICA POKÉMON - DIRECTORA: M. TAPIA ///</div>
        </div>

        <div class="row justify-content-center">
            
            @foreach($LocalPokemon as $p )
            <div class="col-lg-4 col-md-6 mb-5"> 
                
                <div class="flip-card">
                    <div class="flip-card-inner">
                        
                        <div class="flip-card-front">
                            <div class="lab-header-bar">
                                UNIT-{{ str_pad($p->id, 3, '0', STR_PAD_LEFT) }} // CONTAINMENT CHAMBER
                            </div>
                            
                            <div class="scanner-line"></div>
                            
                            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/{{ $p->id }}.png" 
                                 alt="{{ $p->name }}" class="img-main">
                            
                            <div class="poke-name">{{ $p->name }}</div>
                            
                            <div style="font-family: 'Share Tech Mono'; color: #00f3ff; margin-top: 5px; font-size: 0.8rem;">
                                SPECIMEN CLASSIFIED
                            </div>

                            <div class="lab-footer-bar">
                                ESTADO: ESTABLE / CONTENIDO
                            </div>
                        </div>

                        <div class="flip-card-back">
                            <h4 style="font-family: 'Orbitron'; color: #00f3ff; margin-bottom: 30px; border: 1px solid #00f3ff; padding: 5px 15px;">
                                BIO-SCAN RESULTS
                            </h4>
                            
                            <div class="data-row"><span class="data-label">GENETIC_POWER</span><span class="data-value">{{ rand(8000, 9999) }}</span></div>
                            <div class="cyber-bar-container"><div class="cyber-bar" style="width: {{ rand(70, 95) }}%"></div></div>

                            <div class="data-row"><span class="data-label">NEURAL_SPEED</span><span class="data-value">{{ rand(500, 900) }} ns</span></div>
                            <div class="cyber-bar-container"><div class="cyber-bar" style="width: {{ rand(50, 90) }}%; background: #00f3ff; box-shadow: 0 0 10px #00f3ff;"></div></div>

                            <div class="holo-btn">DOWNLOAD DATA</div>
                        </div>

                    </div>
                </div>

            </div>
            @endforeach

        </div>
        <br><br>
    </div>

    <script>
        const cursorRing = document.getElementById('cursor-ring');
        const cursorDot = document.getElementById('cursor-dot');

        document.addEventListener('mousemove', (e) => {
            cursorDot.style.left = e.clientX + 'px';
            cursorDot.style.top = e.clientY + 'px';
            setTimeout(() => {
                cursorRing.style.left = e.clientX + 'px';
                cursorRing.style.top = e.clientY + 'px';
            }, 50);
        });

        document.addEventListener('mousedown', () => {
            cursorRing.style.transform = 'translate(-50%, -50%) scale(0.5)';
            cursorRing.style.background = 'rgba(0, 243, 255, 0.2)';
        });

        document.addEventListener('mouseup', () => {
            cursorRing.style.transform = 'translate(-50%, -50%) scale(1)';
            cursorRing.style.background = 'transparent';
        });
    </script>

</body>
</html>