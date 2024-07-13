<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $td = $_POST['td'];
    $protein = $_POST['protein'];
    $usia = $_POST['usia'];

    $rule = new FuzzyRule();
    $kategori = $rule->determineRisk($td, $protein, $usia);

    echo "Kategori Risiko: " . $kategori;
}
?>
