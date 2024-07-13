<?php
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
?>
