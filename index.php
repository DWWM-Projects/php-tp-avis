<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp Avis</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="w-full">
    <?php 

    ?>

    <div class="contains w-4/5 mx-auto"> <!-- Container -->

        <h1 class="text-3xl">Ch'ti Restaurant</h1>

        <div class="w-full mx-auto"> <!-- Div notes et avis -->

            <div class="w-full bg-gray-100"> <!-- En-têtes -->
                <p>Note moyenne</p>
            </div>

            <div class="w-full flex flex-row text-center"> <!-- Encadrement row avis -->

                <div class="w-1/3 flex flex-column text-center"> <!-- Avis -->
                    <p>3.3 / 5</p>
                    <span>@todo stars</span>
                    <p>4 avis</p>
                </div>

                <div class="w-1/3 flex-flex-column text-center"> <!-- Div barres avis -->
                    <span>@todo barres avis</span>
                </div>
                
                <div class="w-1/3 flex-flex-column text-center"> <!-- Div notation -->
                    <p>Laissez votre avis</p>
                    <a href="#">Noter</a>
                </div>

            </div> <!-- Fin Encadrement row avis -->

        </div> <!-- Fin Div notes et avis -->


        <div> <!-- Div formulaire -->

            <div class="w-full bg-gray-100">
                <p>Publier un avis</p>
            </div>

            <form class="flex flex-column" method="POST">

                <label for="name">Nom</label>
                <input type="text" name="name" id="name">

                <label for="comment">Commentaire</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>

                <label for="rate">Note</label>
                <input type="radio" name="rate" id="rate"><span>1</span>
                <input type="radio" name="rate" id="rate"><span>2</span>
                <input type="radio" name="rate" id="rate"><span>3</span>
                <input type="radio" name="rate" id="rate"><span>4</span>
                <input type="radio" name="rate" id="rate"><span>5</span>

                <div>
                    <button>Noter</button>
                </div>

            </form>

        </div> <!-- Fin Div formulaire -->

        <div class="w-full"> <!-- Div commentaires -->

            <div> <!-- Div encadré commentaire -->

                <div> <!-- Partie Avatar -->
                    <span>@todo avatar</span>
                </div>

                <div> <!-- Partie commentaire -->

                    <div> <!-- utilisateur -->
                        <p>Matthieu Mota</p>
                    </div>

                    <div> <!-- Avis -->
                        <span></span>
                        <p>Très bon restaurant</p>
                    </div>

                    <div> <!-- Date -->

                    </div>

                </div> <!-- Fin partie commentaire -->

            </div> <!-- Fin div encadré -->


        </div> <!-- Fin div commentaire -->


    </div> <!-- container -->
    
</body>
</html>