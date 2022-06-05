<?php 

function hariIndo($hariInggris) {//

  switch ($hariInggris) {
    case 'Sunday':
      return 'Minggu';
    case 'Monday':
      return 'Senin';
    case 'Tuesday':
      return 'Selasa';
    case 'Wednesday':
      return 'Rabu';
    case 'Thursday':
      return 'Kamis';
    case 'Friday':
      return 'Jumat';
    case 'Saturday':
      return 'Sabtu';
    default:
      return 'hari tidak valid';
  }

}

function bulanIndo($blnIngg){
  switch ($blnIngg) {
    case '1';//'January':
      return 'Januari';
    case '2';//'February':
      return 'Februari';
    case '3';//'March':
      return 'Maret';
    case '4';//'April':
      return 'April';
    case '5';//'May':
      return 'Mei';
    case '6';//'June':
      return 'Juni';
    case '7';//'July':
      return 'Juli';
    case '8';//'August':
      return 'Agustus';
    case '9';//'September':
      return 'September';
    case '10';//'October':
      return 'Oktober';
    case '11';//'November':
      return 'November';
    case '12';//'December':
      return 'Desember';
    default:
      return 'bulan tidak valid';
  }
}

?>