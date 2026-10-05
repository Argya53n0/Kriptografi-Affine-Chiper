<?php
class AffineCipher {
    private $m = 26; // Modulo untuk abjad

    // Mencari Modular Multiplicative Inverse
    public function modInverse($a, $m) {
        $a = $a % $m;
        for ($x = 1; $x < $m; $x++) {
            if (($a * $x) % $m == 1) {
                return $x;
            }
        }
        return -1;
    }

    public function processText($text, $a, $b, $isEncrypt, $format) {
        $a_inv = $this->modInverse($a, $this->m);
        if ($a_inv === -1) {
            return ["error" => "Kunci 'a' ($a) tidak relatif prima dengan {$this->m}."];
        }

        $result = "";
        $chars = str_split($text);

        foreach ($chars as $char) {
            $ascii = ord($char);
            if ($ascii >= 65 && $ascii <= 90) { // Kapital
                $p = $ascii - 65;
                $c = $isEncrypt ? ($a * $p + $b) % $this->m : ($a_inv * ($p - $b)) % $this->m;
                if ($c < 0) $c += $this->m;
                $result .= chr($c + 65);
            } elseif ($ascii >= 97 && $ascii <= 122) { // Kecil
                $p = $ascii - 97;
                $c = $isEncrypt ? ($a * $p + $b) % $this->m : ($a_inv * ($p - $b)) % $this->m;
                if ($c < 0) $c += $this->m;
                $result .= chr($c + 97);
            } else {
                $result .= $char; // Abaikan selain alfabet
            }
        }

        if ($isEncrypt) {
            if ($format === 'nospace') {
                $result = preg_replace('/\s+/', '', $result);
            } elseif ($format === 'group5') {
                $result = preg_replace('/\s+/', '', $result);
                $result = trim(chunk_split($result, 5, ' '));
            }
        }

        return ["success" => $result];
    }
}
?>