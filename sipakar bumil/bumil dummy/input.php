<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar Kelainan pada Ibu Hamil</title>
</head>
<body>
    <h1>Sistem Pakar Kelainan pada Ibu Hamil menggunakan Logika Fuzzy</h1>
    <form method="post" action="">
        <label for="td">Tekanan Darah (mmHg):</label>
        <input type="number" id="td" name="td" required><br><br>
        <label for="protein">Tingkat Protein dalam Urin (g/L):</label>
        <input type="number" id="protein" name="protein" step="0.1" required><br><br>
        <label for="usia">Usia Kehamilan (minggu):</label>
        <input type="number" id="usia" name="usia" required><br><br>
        <input type="submit" value="Hitung">
    </form>

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
</body>
</html>
