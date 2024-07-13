<?php
class Fuzzy {
    // Fungsi keanggotaan untuk tekanan darah
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

    // Fungsi keanggotaan untuk tingkat protein dalam urin
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

    // Fungsi keanggotaan untuk usia kehamilan
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
?>
