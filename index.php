
<?php
require_once 'header.php';
require_once './includes/functions.inc.php';

if (!isset($_GET['word'])) {
    // Fetch a random word if the word is not set
    $randomWordData = file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/en/random");
    $randomWordDecoded = json_decode($randomWordData);

    // Redirect to the page with the random word
     header("Location: /dictionary/index.php?word=" . $randomWordDecoded[0]->word);
    exit();
}

$word = $_GET['word'];

$data = file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/en/$word");

if ($data === false) {
    echo "Word not found. Please try again.";
    exit();
}

$decodedData = json_decode($data);

// Check if the word is not found in the API response
if ($data === null) {
    echo "Word not found. Please try again.";
    exit();
}


$source = $decodedData[0]->sourceUrls[0];
if (isset($decodedData[0]->phonetic)) {
    $phonetic = $decodedData[0]->phonetic;
} else {
    $phonetic = $decodedData[0]->phonetics[2]->text;
}

$definition = $decodedData[0]->meanings[0]->definitions[0]->definition;
$meanings = $decodedData[0]->meanings;

// var_dump ($decodedData[0]);
// echo '<pre>' . var_export($decodedData[0], true) . '</pre>';

?>

<!-- Your HTML code continues... -->




        <section class="flex items-center justify-between pt-6">
            
            <div class="">
                <?php
                if(isset($_GET['word'])){
                echo "<h2 class='text-2xl text-gray-700 pb-2 capitalize'>$word</h2>";
                }
                ?>

                <?php
                if(isset($_GET['word'])){
                echo "<p class='text-purple-700'>$phonetic</p>";
                }
                ?>
             

            </div>
            <div>

            <button class="bg-purple-400 rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="purple" viewBox="0 0 24 24" stroke-width="1.5" stroke="purple" class="p-3 w-10 h-10">
  <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
</svg>

            </button>
          
            </div>
        </section>

        <?php
// Assuming $meanings is an array of meanings

foreach ($meanings as $meaning) {
    echo '<section>';

    // Part of speech as heading
    echo '<h2 class="text-gray-800 py-6 capitalize">' . $meaning->partOfSpeech . '</h2>';
    echo "<h2 class='text-gray-500 pb-2'>Meaning</h2>";

    // If there are multiple definitions
    echo "<ul class='list-disc text-gray-700'>";
    foreach ($meaning->definitions as $definition) {
        echo "<li>";
        // Definition in a paragraph
        echo '<p>' . $definition->definition . '</p>';
        echo "</li>";
    }
    echo "</ul>";

    // Gather Synonyms and Antonyms
    $allSynonyms = [];
    $allAntonyms = [];

    foreach ($meaning->definitions as $definition) {
        // If there are synonyms
        if (isset($definition->synonyms)) {
            $allSynonyms = array_merge($allSynonyms, $definition->synonyms);
        }

        // If there are antonyms
        if (isset($definition->antonyms)) {
            $allAntonyms = array_merge($allAntonyms, $definition->antonyms);
        }
    }

    // Display Synonyms
    if (!empty($allSynonyms)) {
        echo "<p class='text-gray-900'>Synonyms:</p> " . implode(', ', array_unique($allSynonyms)) . '<br>';
    }

    // Display Antonyms
    if (!empty($allAntonyms)) {
        echo "<p class='text-gray-900'>Antonyms:</p> " . implode(', ', array_unique($allAntonyms)) . '<br>';
    }

    echo '</section>';
}
?>

       <!-- Source -->
<section>
<?php
                if(isset($_GET['word'])){
                echo "<p class='text-gray-500 pt-5 border-t border-t-purple-300'>Source: <a class='underline text-gray-700' href='$source'>$source</a></p>";
                }
                ?>
    
</section>
    </main>
</body>
</html>