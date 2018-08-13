
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."third_party/mpdf/mpdf.php";

class Lib_mpdf extends mPDF {
  public function __construct() {
    parent::__construct();
  }
  public function  site() {
    //https://packagist.org/packages/mpdf60/mpdf
  }
}