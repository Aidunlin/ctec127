<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Your style sheet -->
    <link rel="stylesheet" href="css/style.css">
    <title>CTEC 127 Lab 2 Winter 2024</title>
</head>

<body>
    <?php
    // Array holding: Text to appear for link, url to access the link, title attribute text
    $navigationData = [
        ["Home", "ctec-127-lab-2.php", "Home page"],
        ["Products", "ctec-127-lab-2.php", "View our products page"],
        ["Order", "ctec-127-lab-2.php", "Place an order page"],
        ["Contact", "ctec-127-lab-2.php", "Get in touch with us page"]
    ];

    function displayNav(array &$data) // pass by reference
    {
        for ($i = 0; $i < count($data); $i++) {
            [$text, $link, $title] = $data[$i]; // array destructuring
            echo "<a class=\"p-1 m-1\" href=\"$link\" title=\"$title\">$text</a>";
        }
    }
    ?>

    <nav>
        <div class="container">
            <div class="row">
                <div class="col mt-5 text-center">
                    <?php displayNav($navigationData); ?>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 p-3">
                    <section>
                        <h2>Placeholder Text</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa praesentium porro facere velit beatae ipsum aspernatur consequuntur sequi voluptatum alias dignissimos odit, nobis nesciunt possimus sed earum cum similique, expedita explicabo iure voluptate laudantium? Deserunt, eaque rerum dolorum architecto numquam tenetur quo ullam expedita, blanditiis dicta et, distinctio cum consequuntur aliquid perspiciatis! Eos quas magni optio labore nihil pariatur dolorem sed totam quia, quidem eum iste non iure quibusdam nobis consequatur voluptatum enim. Accusantium nemo enim quaerat placeat dicta nesciunt tempora accusamus assumenda quasi laborum culpa expedita, ullam eveniet est, omnis voluptate mollitia. Facere, totam vel eos sed ex deleniti praesentium consequatur dolores dolor! Voluptatibus, natus illo corrupti repellendus cumque consectetur possimus temporibus dignissimos architecto delectus ab tempore fugit blanditiis alias inventore accusantium quae repudiandae beatae mollitia vel placeat fuga impedit, debitis necessitatibus. Consequatur perferendis quas omnis molestias alias porro veritatis amet debitis, iure minus error eveniet consequuntur voluptas sint a minima saepe. Officiis quae iste eaque itaque recusandae explicabo aspernatur earum delectus ducimus cumque doloremque vel officia incidunt accusantium, sapiente corrupti nihil fugit quibusdam voluptate? Tempora quidem perferendis eos corrupti at ipsa molestias iusto dolor voluptates sit quis doloremque, mollitia vitae dolorem consectetur consequatur illo dolorum ipsum. Blanditiis facilis quas ut libero natus? Ipsum, dicta vitae! Dicta maiores eaque reiciendis maxime facere saepe autem voluptates culpa ea recusandae, doloremque ipsum illo ut at perspiciatis repellendus natus rem velit! Nihil quidem voluptatum, vero iure consequuntur quis, aut labore distinctio itaque dolores quos saepe molestias praesentium, excepturi ipsum commodi maxime harum!</p>
                    </section>
                </div>

                <div class="col-6 p-3">
                    <section>
                        <h2>More Placeholder Text</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa praesentium porro facere velit beatae ipsum aspernatur consequuntur sequi voluptatum alias dignissimos odit, nobis nesciunt possimus sed earum cum similique, expedita explicabo iure voluptate laudantium? Deserunt, eaque rerum dolorum architecto numquam tenetur quo ullam expedita, blanditiis dicta et, distinctio cum consequuntur aliquid perspiciatis! Eos quas magni optio labore nihil pariatur dolorem sed totam quia, quidem eum iste non iure quibusdam nobis consequatur voluptatum enim. Accusantium nemo enim quaerat placeat dicta nesciunt tempora accusamus assumenda quasi laborum culpa expedita, ullam eveniet est, omnis voluptate mollitia. Facere, totam vel eos sed ex deleniti praesentium consequatur dolores dolor! Voluptatibus, natus illo corrupti repellendus cumque consectetur possimus temporibus dignissimos architecto delectus ab tempore fugit blanditiis alias inventore accusantium quae repudiandae beatae mollitia vel placeat fuga impedit, debitis necessitatibus. Consequatur perferendis quas omnis molestias alias porro veritatis amet debitis, iure minus error eveniet consequuntur voluptas sint a minima saepe. Officiis quae iste eaque itaque recusandae explicabo aspernatur earum delectus ducimus cumque doloremque vel officia incidunt accusantium, sapiente corrupti nihil fugit quibusdam voluptate? Tempora quidem perferendis eos corrupti at ipsa molestias iusto dolor voluptates sit quis doloremque, mollitia vitae dolorem consectetur consequatur illo dolorum ipsum. Blanditiis facilis quas ut libero natus? Ipsum, dicta vitae! Dicta maiores eaque reiciendis maxime facere saepe autem voluptates culpa ea recusandae, doloremque ipsum illo ut at perspiciatis repellendus natus rem velit! Nihil quidem voluptatum, vero iure consequuntur quis, aut labore distinctio itaque dolores quos saepe molestias praesentium, excepturi ipsum commodi maxime harum!</p>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <footer class="mb-5">
        <div class="container">
            <div class="row mt-5">
                <div class="col text-center">
                    <?php displayNav($navigationData); ?>
                    <p class="mt-3">&copy; 2024 Aidan Linerud 🍕</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>