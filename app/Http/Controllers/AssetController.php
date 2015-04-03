<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class AssetController extends Controller {

	public function destroy($id) {
		/*$asset    = Asset::find($id);
		$filename = public_path() . '/'. Config::get('site_info')['upload_path'] . $asset->file;
		if (File::exists($filename)) {
			File::delete($filename);
		}
		$asset->delete();

		return "ok";*/
	}

	public function upload_file() {

		if (Input::hasFile('file')) {
			$address  = Input::file('file');
			$filename = time() . "_" . strtolower($address->getClientOriginalName());

			$storage_path = public_path() . '/' . Config::get('site_info')['upload_path'] . '/';
			$address->move($storage_path, $filename);

			$display_path = asset(Config::get('site_info')['upload_path'] . '/' . $filename);
			$array        = array(
				'filelink' => $display_path
			);

			return stripslashes(json_encode($array));
		}

		return false;
	}

}
