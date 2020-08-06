<?php
function arena_tables(){
	?>
    <script>
        let table = document.getElementsByClassName('arena__tables')
        table.onclick = function () {
            if (table.classList.contains('table__active')){
                table.classList.remove('table__active')
            } else {
                table.classList.add('table__active')
            }

        };
        JQuery(".arena__tables").click(function() {
            this.classList.toggle("table__active");
        });
    </script>
    <style>
        .table__reservation{
            background: #fff;
        }
        .arena__area{
            fill: white;


        }
        .arena__tables{
            stroke:#2B2A29;
            fill: #73A724;
            stroke-width:20;
            stroke-miterlimit:22.9256;
            cursor: pointer;
        }
        .arena__tables:hover {
            fill: #4D174D;
        }
        .table__active {
            fill: #4D174D;
        }

    </style>
	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="210mm" height="210mm" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
	     viewBox="0 0 21000 21000"
	     xmlns:xlink="http://www.w3.org/1999/xlink">
 <defs>

 </defs>
		<g id="areba__area" class="areba__area">
			<rect id="arena__table1" class="arena__tables" x="1772.74" y="18505.64" width="3285.12" height="1704.54"/>
			<rect id="arena__table2" class="arena__tables" x="1772.97" y="16525.22" width="3285.12" height="1704.54"/>
			<rect id="arena__table3" class="arena__tables" x="1759.62" y="14557.9" width="3285.12" height="1704.54"/>
			<rect id="arena__table4" class="arena__tables" x="1781.56" y="11217.99" width="3285.12" height="1704.54"/>
			<rect id="arena__table5" class="arena__tables" x="1781.79" y="9237.57" width="3285.12" height="1704.54"/>
			<rect id="arena__table6" class="arena__tables" x="1768.44" y="7270.25" width="3285.12" height="1704.54"/>
			<rect id="arena__table7" class="arena__tables" x="1733.16" y="3890.6" width="3285.12" height="1704.54"/>
			<rect id="arena__table8" class="arena__tables" x="4908.15" y="257" width="3285.12" height="1704.54"/>
			<rect id="arena__table9" class="arena__tables" transform="matrix(2.67069E-14 -1 1 2.67069E-14 2325.82 3498.26)" width="3285.12" height="1704.54"/>
			<rect id="arena__table10" class="arena__tables" transform="matrix(2.67069E-14 -1 1 2.67069E-14 5783.04 5650.21)" width="3285.12" height="1704.54"/>
			<rect id="arena__table11" class="arena__tables" x="11201.65" y="297.88" width="3285.12" height="1704.54"/>
			<rect id="arena__table12" class="arena__tables" x="15999.43" y="297.88" width="3285.12" height="1704.54"/>
			<rect id="arena__table13" class="arena__tables" x="16812.97" y="2825.82" width="1728.61" height="1728.61"/>
			<rect id="arena__table14" class="arena__tables" x="16812.97" y="4907.22" width="1728.61" height="1728.61"/>
			<rect id="arena__table15" class="arena__tables" x="16848.24" y="6988.6" width="1728.61" height="1728.61"/>
			<rect id="arena__table16" class="arena__tables" x="12050.45" y="2931.66" width="1728.61" height="1728.61"/>
			<rect id="arena__table17" class="arena__tables" x="12050.45" y="5013.06" width="1728.61" height="1728.61"/>
			<rect id="arena__table18" class="arena__tables" x="12085.74" y="7094.44" width="1728.61" height="1728.61"/>
			<rect id="arena__table19" class="arena__tables" x="16477.82" y="15296.53" width="3175" height="5256.39"/>
		</g>
</svg>
	<?php
};


