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

        require 'config/db.php';

        // setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        // $formatter = IntlDateFormatter::create('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        // $formatter->setPattern('cccc dd MMMM Y');

        $users = [
            [
                'name' => $db->query('SELECT * FROM review WHERE ')
                'rate' => 5,
                'comment' => 'Très bon restaurant',
                'date' => '2022-02-09 11:43:12',
            ],
            // [
            //     'name' => 'Fiorella Mota',
            //     'rate' => 5,
            //     'comment' => 'Très bon restaurant',
            //     'date' => '2022-02-09 11:43:12',
            // ],
            // [
            //     'name' => 'Marina Mota',
            //     'rate' => 4,
            //     'comment' => 'Super restaurant',
            //     'date' => '2022-02-04 08:12:12',
            // ],
            // [
            //     'name' => 'Matthieu Mota',
            //     'rate' => 3,
            //     'comment' => 'Mauvais restaurant',
            //     'date' => '2022-02-06 06:23:12',
            // ],
            // [
            //     'name' => 'Sam Double',
            //     'rate' => 4,
            //     'comment' => 'Plutôt bon',
            //     'date' => '2022-05-21 21:54:12',
            // ],
        ];

        $rateSum = 0;
        $divisor = 0;

        foreach ($users as $index => $user) {
            $rateSum += $user['rate'];            
        };

        for ($i = 0; $i <= $index; $i++) {
            $divisor = $index + 1;
        };

        $rateAverage = $rateSum / $divisor;   
        $review = $index + 1; 

        function toClean($value) {
            return trim(htmlspecialchars($value));
        }

        $query = $db->query('SELECT * FROM review')->fetchall();

        $name = toClean($_POST['name'] ?? null);
        $rate = toClean($_POST['rate'] ?? null);
        $comment = toClean($_POST['comment'] ?? null);
        $date = date('l d M Y').' à '.date('H \h i');

        // $date = date('l d M Y').' à '.date('H \h i');
        // $date = toClean($_POST['date']) ?? null;

        $errors = [];
        $success = false;

        if (!empty($_POST)) {

            if (empty($name)) {
                $errors = 'Veuillez entrer un nom svp.';
            }

            if (empty($rate)) {
                $errors = 'Veuillez entrer une note svp.';
            }

            if (empty($comment)) {
                $errors = 'Entrez un avis svp.';
            }

            $success = true;
        }

        if (empty($errors)) {
            $success = true;

            $query = $db->prepare('INSERT INTO review (name, rate, review, created_at)
            VALUES (:name, :rate, :comment, :date)');
        
            $query->execute([
                ':name' => $name,
                ':rate' => $rate,
                ':comment' => $comment,
                'date' => $date,
            ]);
        }


        
    ?>

    <div class="contains w-4/5 mx-auto"> <!-- Container -->

        <h1 class="text-4xl text-bold my-6">Ch'ti Restaurant</h1>

        <div class="w-full mx-auto border my-6"> <!-- Div notes et avis -->

            <div class="w-full bg-gray-100 border-b p-2"> <!-- En-têtes -->
                <p>Note moyenne</p>
            </div>

            <div class="w-full flex flex-row text-center"> <!-- Encadrement row avis -->

                <div class="w-1/3 flex flex-col items-center my-3"> <!-- Avis -->
                    <p class="text-6xl"><span><?= $rateAverage ?></span> / 5</p>
                    <p class="flex flex-row">
                    <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $rateAverage >= 1 ? 'yellow' : 'fill-black'; ?>">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $rateAverage >= 2 ? 'yellow' : 'black'; ?>">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $rateAverage >= 3 ? 'yellow' : 'black'; ?>">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $rateAverage >= 4 ? 'yellow' : 'black'; ?>">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $rateAverage >= 5 ? 'yellow' : 'black'; ?>">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    </p>
                    <p class="text-3xl text bold"><?= $review ?> avis</p>
                </div>

                <div class="w-1/3 flex-flex-col  items-center text-center my-3"> <!-- Div barres avis -->
                    <div class="flex flex-row">
                        <span class="text-xl">5</span><img class="h-7 w-7" src="img/stars.svg">
                    </div>
                    <div class="flex flex-row">
                        <span class="text-xl">4</span><img class="h-7 w-7" src="img/stars.svg">
                    </div>
                    <div class="flex flex-row">
                        <span class="text-xl">3</span><img class="h-7 w-7" src="img/stars.svg">
                    </div>
                    <div class="flex flex-row">
                        <span class="text-xl">2</span><img class="h-7 w-7" src="img/stars.svg">
                    </div>
                    <div class="flex flex-row">
                        <span class="text-xl">1</span><img class="h-7 w-7" src="img/stars.svg">
                    </div>
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
                    <input type="radio" name="rate" id="rate" value="1"><span class="ml-1">1</span>
                    <input type="radio" name="rate" id="rate" value="2"><span class="ml-1">2</span>
                    <input type="radio" name="rate" id="rate" value="3"><span class="ml-1">3</span>
                    <input type="radio" name="rate" id="rate" value="4"><span class="ml-1">4</span>
                    <input type="radio" name="rate" id="rate" value="5"><span class="ml-1">5</span>
                </div>

                <div class="my-3">
                    <button class="bg-blue-400 hover:bg-blue-200 duration-300 text-center text-white rounded p-2">Noter</button>
                </div>

                <!-- <?php if (!empty($errors)) { ?>
                    <div class="my-3">
                        
                            <?php foreach ($errors as $error) { ?>
                                <ul>
                                    <li><?= $error; ?></li>
                                </ul>
                            <?php } ?>
                        
                    </div>
                <?php } ?> -->
                   

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
                                <!-- <img class="h-9 w-9 <?= $user['rate'] < 2 ? 'fill-yellow-600' : 'black'; ?>" src="img/stars.svg"> -->
                                <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $user['rate'] >= 1 ? 'yellow' : 'fill-black'; ?>">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $user['rate'] >= 2 ? 'yellow' : 'black'; ?>">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $user['rate'] >= 3 ? 'yellow' : 'black'; ?>">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $user['rate'] >= 4 ? 'yellow' : 'black'; ?>">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <svg class="h-9 w-9" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="<?= $user['rate'] >= 5 ? 'yellow' : 'black'; ?>">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                            </p>
                            <p><?= $user['comment']; ?></p>
                        </div>
                        
                        <div class="w-full bg-gray-100 border-b p-2 flex justify-end"> <!-- Date -->
                            <?php 
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