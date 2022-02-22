<?php

function format_rupiah($angka)
{
  $hasil_rupiah = "Rp. " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}

function rerata($data)
{
  $n = count($data);
  if ($n > 1) {
    $x =  0;
    foreach ($data as $item) {
      $x = $x + $item->nilai;
    }
    $rerata = $x / $n;
  } else {
    $rerata = 0;
  }
  return round($rerata, PHP_ROUND_HALF_UP);
}

function persentase($data)
{
  $n = count($data);
  if ($n > 1) {
    $x =  0;
    foreach ($data as $item) {
      $x = $x + $item->nilai;
    }
    $persen = $x / $n * 100;
  } else {
    $persen = 0;
  }
  return round($persen, PHP_ROUND_HALF_UP);
}
