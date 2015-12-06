<!DOCTYPE HTML>
<!-- src/DrankProject/Presentation/DrankenAutomaat.php --> 
 
    <head> 
        <meta charset=utf-8> 
        <title>Drankenautomaat</title> 
        <link rel="stylesheet" href="css/styling.css">
    </head> 
    <body> 
        
        <header class="clearfix">
            <div class="header clearfix"><h1>Drankenautomaat</h1></div>
        </header>
        <section class="wrappercontent">
            <div>
                <div class="content clearfix">
                    <ul>
                        <li>
                            <a href="index.php?bedrag=0.10">&euro;0,10</a>       
                        </li>
                        <li>
                            <a href="index.php?bedrag=0.20">&euro;0.20</a>
                        </li>
                        <li>
                            <a href="index.php?bedrag=0.50">&euro;0.50</a>
                        </li>
                        <li>
                            <a href="index.php?bedrag=1">&euro;1.00</a>
                        </li>
                        <li>
                            <a href="index.php?bedrag=2">&euro;2.00</a>
                        </li>
                    </ul> 
                    <span class="totalInsert">Uw totaal : {{totaal}}&euro;</span>
                </div>
            </div>
        {% if check %}
            Weergave : <br />
            {% for munt,aantal in wisselgeld %}
                {{aantal}} x &euro;{{munt}} <br />
            {% endfor %}
        {% endif %}
        
        <h1>Kies uw drank</h1>
        {% if errorVoorraad %}
            <span class="error">De voorraad van deze drank is op, Maak een andere keuze !</span><br />
        {% endif %}
        {% for drank in drankenlijst %}
        <a href="index.php?keuze={{drank.id}}">{{drank.dranknaam}}</a>
        {% endfor %}
        </section>
         
            
          
        <footer>
            <div></div>
        </footer>
    </body>  
