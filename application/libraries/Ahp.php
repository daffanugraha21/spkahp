<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahp {

    /**
     * Hitung priority vector (eigenvector aproksimasi) dari matriks pairwise NxN.
     * Metode: normalisasi kolom + rata-rata baris.
     */
    public function priority_vector(array $matrix): array
    {
        $n = count($matrix);
        if ($n === 0) return [];

        // jumlah kolom
        $colSum = array_fill(0, $n, 0.0);
        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $n; $i++) {
                $colSum[$j] += (float)$matrix[$i][$j];
            }
            // hindari div/0
            if ($colSum[$j] == 0) $colSum[$j] = 1e-9;
        }

        // normalisasi kolom dan rata-rata baris
        $priority = array_fill(0, $n, 0.0);
        for ($i = 0; $i < $n; $i++) {
            $rowSum = 0.0;
            for ($j = 0; $j < $n; $j++) {
                $rowSum += ((float)$matrix[$i][$j]) / $colSum[$j];
            }
            $priority[$i] = $rowSum / $n;
        }

        // normalisasi akhir supaya sum=1 (jaga-jaga)
        $sum = array_sum($priority);
        if ($sum > 0) {
            foreach ($priority as $k => $v) $priority[$k] = $v / $sum;
        }

        return $priority;
    }

    /**
     * Konsistensi: kembalikan [lambdaMax, CI, CR].
     * RI diset sesuai n (Saaty). CR < 0.1 disarankan.
     */
    public function consistency(array $matrix, array $priority): array
    {
        $n = count($matrix);
        if ($n === 0) return ['lambdaMax'=>0, 'CI'=>0, 'CR'=>0];

        $lambdaMax = 0.0;
        for ($i = 0; $i < $n; $i++) {
            $rowSum = 0.0;
            for ($j = 0; $j < $n; $j++) {
                $rowSum += ((float)$matrix[$i][$j]) * $priority[$j];
            }
            $lambdaMax += $priority[$i] > 0 ? ($rowSum / $priority[$i]) : 0;
        }
        $lambdaMax /= $n;

        $CI = ($n > 1) ? ($lambdaMax - $n) / ($n - 1) : 0;

        // Random Index (Saaty) untuk n=1..15 (bisa diperluas)
        $RI = [0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];
        $riVal = ($n-1 < count($RI)) ? $RI[$n-1] : 1.59;

        $CR = ($riVal > 0) ? ($CI / $riVal) : 0;

        return [
            'lambdaMax' => $lambdaMax,
            'CI'        => $CI,
            'CR'        => $CR
        ];
    }

    /**
     * Bangun matriks pairwise dari skor alternatif (rasio score_i/score_j).
     * epsilon mencegah pembagian nol.
     */
    public function pairwise_from_scores(array $scores, float $epsilon = 1e-6): array
    {
        // $scores = [altIndex => scoreFloat]
        $alts = array_keys($scores);
        $n = count($alts);
        $M = array_fill(0, $n, array_fill(0, $n, 1.0));

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) { $M[$i][$j] = 1.0; continue; }
                $num = max((float)$scores[$alts[$i]], $epsilon);
                $den = max((float)$scores[$alts[$j]], $epsilon);
                $M[$i][$j] = $num / $den;
            }
        }
        return $M;
    }

    /**
     * Hitung AHP lengkap:
     * - priority & CR kriteria
     * - priority alternatif per kriteria
     * - skor global alternatif
     */
    public function calculate(array $criteriaMatrix, array $altMatrices): array
    {
        // 1) Kriteria
        $criteriaW = $this->priority_vector($criteriaMatrix);
        $criteriaC = $this->consistency($criteriaMatrix, $criteriaW);

        // 2) Alternatif per kriteria
        $altW = [];
        $altC = [];
        foreach ($altMatrices as $k => $mat) {
            $w = $this->priority_vector($mat);
            $c = $this->consistency($mat, $w);
            $altW[$k] = $w;
            $altC[$k] = $c;
        }

        // 3) Skor global
        $nAlt = count(reset($altW));
        $global = array_fill(0, $nAlt, 0.0);
        foreach ($criteriaW as $k => $cw) {
            for ($a = 0; $a < $nAlt; $a++) {
                $global[$a] += $cw * $altW[$k][$a];
            }
        }

        return [
            'criteria_weights'     => $criteriaW,
            'criteria_consistency' => $criteriaC,
            'alt_weights'          => $altW,
            'alt_consistencies'    => $altC,
            'global'               => $global
        ];
    }
}
