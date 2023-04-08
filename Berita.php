<?php
namespace App\Controllers;
use App\Models\BeritaModel;

class Berita extends BaseController
{
      /**
	  * index function
	  */
	  public function index()
	  {
	        //model initialize
			$Beritas = new BeritaModel();
			$pager = \Config\Services::pager();
			
			$data = array(
			    'beritas' =>$Beritas->paginate(2, 'berita'),
				'pager' =>$Beritas->pager
			);


			return view('berita', $data);
			
		}
}		
?>