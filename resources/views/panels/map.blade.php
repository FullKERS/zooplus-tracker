<h2>Map</h2>

<div class="map-container">
    <svg viewBox="0 0 1000 800">

        <!-- Definicja strzałek -->
        <defs>
            <marker id="arrow" markerWidth="10" markerHeight="10" refX="10" refY="3" orient="auto"
                markerUnits="strokeWidth">
                <path d="M0,0 L0,6 L9,3 z" fill="red" />
            </marker>
        </defs>

        <!-- Mapa Europy -->
        <image href="https://pl.m.wikipedia.org/wiki/Plik:Blank_map_of_Europe.svg" width="1000" height="800" />

        <!-- Punkt startowy: Dębica -->
        <circle cx="540" cy="410" r="5" fill="red" />
        <text x="550" y="405">Dębica</text>

        <!-- Linie do różnych miast -->
        <line x1="540" y1="410" x2="450" y2="600" />
        <text x="470" y="590">Kampania 1</text>

        <line x1="540" y1="410" x2="700" y2="450" />
        <text x="680" y="440">Kampania 2</text>

        <line x1="540" y1="410" x2="500" y2="320" />
        <text x="510" y="310">Kampania 3</text>

    </svg>
</div>