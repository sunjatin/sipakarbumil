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
    class Fuzzy {
        public function tekananDarahRendah($td) {
            if ($td <= 90) {
                return 1;
            } elseif ($td > 90 && $td < 120) {
                return (120 - $td) / (120 - 90);
            } else {
                return 0;
            }
        }

        public function tekananDarahNormal($td) {
            if ($td > 90 && $td < 120) {
                return ($td - 90) / (120 - 90);
            } elseif ($td >= 120 && $td <= 140) {
                return (140 - $td) / (140 - 120);
            } else {
                return 0;
            }
        }

        public function tekananDarahTinggi($td) {
            if ($td >= 140) {
                return 1;
            } elseif ($td >= 120 && $td < 140) {
                return ($td - 120) / (140 - 120);
            } else {
                return 0;
            }
        }

        public function proteinRendah($protein) {
            if ($protein <= 0.3) {
                return 1;
            } elseif ($protein > 0.3 && $protein < 0.5) {
                return (0.5 - $protein) / (0.5 - 0.3);
            } else {
                return 0;
            }
        }

        public function proteinNormal($protein) {
            if ($protein > 0.3 && $protein < 0.5) {
                return ($protein - 0.3) / (0.5 - 0.3);
            } elseif ($protein >= 0.5 && $protein <= 0.8) {
                return (0.8 - $protein) / (0.8 - 0.5);
            } else {
                return 0;
            }
        }

        public function proteinTinggi($protein) {
            if ($protein >= 0.8) {
                return 1;
            } elseif ($protein >= 0.5 && $protein < 0.8) {
                return ($protein - 0.5) / (0.8 - 0.5);
            } else {
                return 0;
            }
        }

        public function usiaKehamilanAwal($usia) {
            if ($usia <= 20) {
                return 1;
            } elseif ($usia > 20 && $usia < 28) {
                return (28 - $usia) / (28 - 20);
            } else {
                return 0;
            }
        }

        public function usiaKehamilanNormal($usia) {
            if ($usia > 20 && $usia < 28) {
                return ($usia - 20) / (28 - 20);
            } elseif ($usia >= 28 && $usia <= 36) {
                return (36 - $usia) / (36 - 28);
            } else {
                return 0;
            }
        }

        public function usiaKehamilanTua($usia) {
            if ($usia >= 36) {
                return 1;
            } elseif ($usia >= 28 && $usia < 36) {
                return ($usia - 28) / (36 - 28);
            } else {
                return 0;
            }
        }
    }

    class FuzzyRule {
        public function determineRisk($td, $protein, $usia) {
            $fuzzy = new Fuzzy();

            $td_rendah = $fuzzy->tekananDarahRendah($td);
            $td_normal = $fuzzy->tekananDarahNormal($td);
            $td_tinggi = $fuzzy->tekananDarahTinggi($td);

            $protein_rendah = $fuzzy->proteinRendah($protein);
            $protein_normal = $fuzzy->proteinNormal($protein);
            $protein_tinggi = $fuzzy->proteinTinggi($protein);

            $usia_awal = $fuzzy->usiaKehamilanAwal($usia);
            $usia_normal = $fuzzy->usiaKehamilanNormal($usia);
            $usia_tua = $fuzzy->usiaKehamilanTua($usia);

            $risiko_rendah = min($td_rendah, $protein_rendah, $usia_awal);
            $risiko_sedang = min($td_normal, $protein_normal, $usia_normal);
            $risiko_tinggi = min($td_tinggi, $protein_tinggi, $usia_tua);

            $max_risk = max($risiko_rendah, $risiko_sedang, $risiko_tinggi);

            if ($max_risk == $risiko_rendah) {
                return "Risiko Rendah";
            } elseif ($max_risk == $risiko_sedang) {
                return "Risiko Sedang";
            } elseif ($max_risk == $risiko_tinggi) {
                return "Risiko Tinggi";
            }
        }
    }

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
