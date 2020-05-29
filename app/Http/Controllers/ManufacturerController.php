<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller
{
    public function createManufacturer(){
		return view('admin.manufacturer.createManufacturer');
	}

	public function storeManufacturer(Request $request){
    	//return $request->all();//return view('admin.manufacturer.storemanufacturer');
    	/*//====elequent Model method-1====
    	$manufacturer = new manufacturer();
    	$manufacturer->manufacturer_name = $request->manufacturer_name;//same from input name
    	$manufacturer->manufacturer_description = $request->manufacturer_description;
    	$manufacturer->publication_status = $request->publication_status;
    	$manufacturer->save();
		return 'info saved successfully';
    	*/
        $this->validate($request,[
            'manufacturer_name'=>'required',
            'manufacturer_description'=>'required',]);
    	////====elequent Model method-2 for small data====
		/*manufacturer::create($request->all());//manufacturer model must be fillable
    	return 'info saved successfully';
*/

    	////====query builder Model method best model data not require model====
    	DB::table('manufacturers')->insert([
    		'manufacturer_name'=> $request->manufacturer_name,//same from input name
    		'manufacturer_description'=> $request->manufacturer_description,
    		'publication_status'=> $request->publication_status,

    	]);
    	//return redirect->back();//same page e chole ashbe method 1 second method niche 
    	return redirect('manufacturer/add')->with('message','Data saved successfully');//same page second method with msg & form e tik kore dite hobe
    }
    public function manageManufacturer(){
        $manufacturers=Manufacturer::all();
        return view('admin.manufacturer.manageManufacturer',['manufacturers'=>$manufacturers]);
    }

    public function editManufacturer($id){
       $manufacturerById=Manufacturer::where('id',$id)->first();//ekta data ashle first else get() use korte hobe
       return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);
   }
   public function updateManufacturer(Request $request){
   // dd( $request->all() );
    //return view('admin.manufacturer.editmanufacturer');
        $manufacturer = Manufacturer::find($request->manufacturerId);//$request->id from form
        $manufacturer->manufacturer_name = $request->manufacturer_name;//same from input name
        $manufacturer->manufacturer_description = $request->manufacturer_description;
        $manufacturer->publication_status = $request->publication_status;
        $manufacturer->save();
        return redirect('manufacturer/manage')->with('message','Data updated successfully');//same 
    }

    public function deleteManufacturer($id){
     $manufacturer=Manufacturer::find($id);
     $manufacturer->delete();
     return redirect('manufacturer/manage')->with('message','Data deleted successfully');//same 
   }
}
