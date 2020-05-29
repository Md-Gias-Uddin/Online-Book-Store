<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
	public function createCategory(){
		return view('admin.category.createCategory');
	}

	public function storeCategory(Request $request){
    	//return $request->all();//return view('admin.category.storeCategory');
    	/*//====elequent Model method-1====
    	$category = new Category();
    	$category->category_name = $request->category_name;//same from input name
    	$category->category_description = $request->category_description;
    	$category->publication_status = $request->publication_status;
    	$category->save();
		return 'info saved successfully';
    	*/
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',]);
    	////====elequent Model method-2 for small data====
		/*Category::create($request->all());//category model must be fillable
    	return 'info saved successfully';
*/

    	////====query builder Model method best model data not require model====
    	DB::table('categories')->insert([
    		'category_name'=> $request->category_name,//same from input name
    		'category_description'=> $request->category_description,
    		'publication_status'=> $request->publication_status,

    	]);
    	//return redirect->back();//same page e chole ashbe method 1 second method niche 
    	return redirect('category/add')->with('message','Data saved successfully');//same page second method with msg & form e tik kore dite hobe
    }

    public function manageCategory(){
        $categories=Category::all();
        return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function editCategory($id){
       $categoryById=Category::where('id',$id)->first();//ekta data ashle first else get() use korte hobe
       return view('admin.category.editCategory',['categoryById'=>$categoryById]);
   }
   public function updateCategory(Request $request){
   // dd( $request->all() );
    //return view('admin.category.editCategory');
        $category = Category::find($request->categoryId);//$request->id from form
        $category->category_name = $request->category_name;//same from input name
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('category/manage')->with('message','Data updated successfully');//same 
    }

    public function deleteCategory($id){
     $category=Category::find($id);
     $category->delete();
     return redirect('category/manage')->with('message','Data deleted successfully');//same 
   }
}