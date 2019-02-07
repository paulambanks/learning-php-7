<!DOCTYPE html>
<html>
    <head>
	<?php include("include/head.php");?>
    </head>

    <body>

        <?php include ("include/navigation.php"); ?>      

        <header>
            <h1 class="page-title">WELCOME</h1>
            <p class="page-intro">Lets play BlackJack</p>
        </header>

        <main class="page-container">
            <section>
                <article>
                    <h2>THE PACK</h2>
                    <p>The standard 52-card pack, randomly shuffled is used.</p>
                    <?php include("cardDeck.php");
                    $deck = new Deck(); // create new object
                    $deck->shuffle();
                    foreach ($deck as $index => $card) { ?>
                        <p><?php echo "$index: $card";?></p>
                    <?php } ?>
                </article>
            </section>
      
        </main>

        <?php include ("include/footer.php"); ?>      
        
    </body>
</html>
