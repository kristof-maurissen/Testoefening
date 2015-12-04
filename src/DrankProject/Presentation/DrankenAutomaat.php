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
                            <a href="index.php?bedrag=0.10">€ 0,10</a>       
                        </li>
                        <li>
                            <a href="index.php?bedrag=0.20">€ 0.20</a>
                        </li>
                        <li>
                            <a href="index.php?bedrag=0.50">€ 0.50</a>
                        </li>
                        <li>
                            <a href="index.php?bedrag=1">€ 1.00</a>
                        </li>
                        <li>
                            <a href="index.php?bedrag=2">€ 2.00</a>
                        </li>
                    </ul> 
                </div>
            </div>
        
        <aside>
            <table>
                <?php
                foreach ($drankenLijst as $drank) {; 
                ?>
                <tr>
                    <!--<td><?php// print ($drank->getFoto());?></td>-->
                    <td><?php print($drank->getDrankNaam());?></td>
                    <td>Prijs</td>
                    <td><?php print ($drank->getPrijs());?></td>
                    <td><?php print ($drank->getVoorraad());?></td>
                </tr>
                <?php 
                }
                ?>
            </table>
        </aside>
        </section>
         
            
          
        <footer>
            <div></div>
        </footer>
    </body> 
