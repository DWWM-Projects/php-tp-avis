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
        date_default_timezone_set('Europe/Paris');

        $users = [
            [
                'name' => 'Fiorella Mota',
                'rate' => 5,
                'comment' => 'Très bon restaurant',
                'date' => '2022-02-09 11:43:12',
            ],
            [
                'name' => 'Marina Mota',
                'rate' => 4,
                'comment' => 'Super restaurant',
                'date' => '2022-02-04 08:12:12',
            ],
            [
                'name' => 'Matthieu Mota',
                'rate' => 3,
                'comment' => 'Mauvais restaurant',
                'date' => '2022-02-06 06:23:12',
            ],
        ];

        

        
    ?>

    <div class="contains w-4/5 mx-auto"> <!-- Container -->

        <h1 class="text-4xl text-bold my-6">Ch'ti Restaurant</h1>

        <div class="w-full mx-auto border my-6"> <!-- Div notes et avis -->

            <div class="w-full bg-gray-100 border-b p-2"> <!-- En-têtes -->
                <p>Note moyenne</p>
            </div>

            <div class="w-full flex flex-row text-center"> <!-- Encadrement row avis -->

                <div class="w-1/3 flex flex-col items-center my-3"> <!-- Avis -->
                    <p class="text-6xl"><span>3.3</span> / 5</p>
                    <p class="flex flex-row">
                        <img class="h-9 w-9" src="img/stars.svg">
                        <img class="h-9 w-9" src="img/stars.svg">
                        <img class="h-9 w-9" src="img/stars.svg">
                        <img class="h-9 w-9" src="img/stars.svg">
                        <img class="h-9 w-9" src="img/stars.svg">
                    </p>
                    <p class="text-3xl text bold">4 avis</p>
                </div>

                <div class="w-1/3 flex-flex-col  items-center text-center my-3"> <!-- Div barres avis -->
                    <span>@todo barres avis</span>
                </div>
                
                <div class="w-1/3 flex-flex-col  items-center text-center my-3"> <!-- Div notation -->
                    <p class="text-3xl text bold">Laissez votre avis</p>
                    <div class="my-6">
                        <a  class="bg-blue-400 hover:bg-blue-200 duration-300 text-center text-white rounded p-2 cursor-pointer"href="#">Noter</a>
                    </div>
                </div>

            </div> <!-- Fin Encadrement row avis -->

        </div> <!-- Fin Div notes et avis -->


        <div class="border my-6"> <!-- Div formulaire -->

            <div class="w-full bg-gray-100 border-b p-2">
                <p>Publier un avis</p>
            </div>

            <form class="flex flex-col items-center" method="POST">

                <div class="my-3">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name"  placeholder="Votre nom">
                </div>

                <div class="my-3">
                    <label for="comment">Commentaire</label>
                    <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Votre commentaire"></textarea>
                </div>

                <div class="my-3">
                    <label for="rate">Note</label>
                    <input type="radio" name="rate" id="rate"><span>1</span>
                    <input type="radio" name="rate" id="rate"><span>2</span>
                    <input type="radio" name="rate" id="rate"><span>3</span>
                    <input type="radio" name="rate" id="rate"><span>4</span>
                    <input type="radio" name="rate" id="rate"><span>5</span>
                </div>

                <div class="my-3">
                    <button class="bg-blue-400 hover:bg-blue-200 duration-300 text-center text-white rounded p-2">Noter</button>
                </div>

            </form>

        </div> <!-- Fin Div formulaire -->

        <div class="w-full"> <!-- Div commentaires -->

            <?php foreach ($users as $user) { ?>


                <?php $avatar = strtoupper(substr($user['name'], 0, 1)); ?>

                <div class="w-full flex flex-row items-center"> <!-- Div encadré commentaire -->         
                    
                    <div class="w-48"> <!-- Partie Avatar -->
                        <span class="bg-green-600 text-white rounded-full p-8"><?= $avatar; ?></span>
                    </div>

                    <div class="w-full flex flex-col my-6"> <!-- Partie commentaire -->                    

                        <div class="w-full bg-gray-100 border-b p-2"> <!-- utilisateur -->
                            <p><?= $user['name']; ?></p>
                        </div>
                        
                        <div class="w-full"> <!-- Avis -->
                            <p class="flex flex-row">
                                <img class="h-9 w-9 <?= $user['rate'] < 2 ? 'bg-yellow-600' : 'bg-black'; ?>" src="img/stars.svg">
                                <img class="h-9 w-9 <?= $user['rate'] < 3 ? 'bg-yellow-600' : 'bg-black'; ?>" src="img/stars.svg">
                                <img class="h-9 w-9 <?= $user['rate'] < 4 ? 'bg-yellow-600' : 'bg-black'; ?>" src="img/stars.svg">
                                <img class="h-9 w-9 <?= $user['rate'] < 5 ? 'bg-yellow-600' : 'bg-black'; ?>" src="img/stars.svg">
                                <img class="h-9 w-9 <?= $user['rate'] == 5 ? 'bg-yellow-600' : 'bg-black'; ?>" src="img/stars.svg">
                            </p>
                            <p><?= $user['comment']; ?></p>
                        </div>
                        
                            
                        <div class="w-full bg-gray-100 border-b p-2 flex justify-end"> <!-- Date -->
                            <?php 
                                // $date = date('l d M Y').' à '.date('H \h i');
                                echo $user['date'];
                            ?>
                        </div>
                    
                    

                    </div> <!-- Fin partie commentaire -->
                
                </div> <!-- Fin div encadré commentaire -->
            <?php } ?>

        </div> <!-- Fin div commentaire -->


    </div> <!-- container -->
    
</body>
</html>