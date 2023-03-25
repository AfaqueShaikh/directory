<?php

namespace App\Modules\TrackerCategories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\GeneralHelper;
use App\Modules\Categories\Models\Category;
use App\Modules\Categories\Models\CategoryTrans;
use App\Modules\TrackerCategories\Models\TrackerCategory;
use App\Modules\TrackerCategories\Models\TrackerCategoryWebsite;
use App\Rules\CategoryValidationRule;
use Illuminate\Http\Request;

class TrackerCategoriesController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TrackerCategory::all();

        return view("TrackerCategories::index", compact('items'));
    }

    public function viewCategoryWebsites($id)
    {
        $items = TrackerCategoryWebsite::where('track_category_id', $id)->get();



        return view("TrackerCategories::list-tracker-websites", compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addCategory()
    {
        $category = Category::where('parent_id', 0)
            ->where('active', 1)
            ->get();
        return view("Categories::add", compact('category'));
    }

    public function storeCategory(Request $request)
    {
        $validator = $request->validate(
            [
                'parent_id' => 'required',
                'name' => ['required', new CategoryValidationRule($request->parent_id, '')],
                'description' => 'required'
            ],
            [
                'parent_id.required' => 'Please select category',
                'name.required' => 'Please enter name',
                'description.required' => 'Please enter description'
            ]
        );

        $category = new Category();
        $category->slug = GeneralHelper::seoUrl($request->name);
        $category->category_type = $request->category_type;
        $category->parent_id = $request->parent_id;

        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }
        $category->save();

        // Trans
        $categoryTrans = new CategoryTrans();

        $categoryTrans->category_id = $category->id;
        $categoryTrans->name = $request->name;
        $categoryTrans->description = $request->description;
        $categoryTrans->lang = 'en';

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/categories'), $filename);
//            $data['image']= $filename;
            $categoryTrans->img = $filename;
        }

        $categoryTrans->save();

        return redirect()
            ->route('admin.categories')
            ->with('message', 'Category added successfully.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editCategory($id)
    {
        $category = Category::where('parent_id', 0)
            ->where('active', 1)
//            ->where('id', '<>', $id)
            ->get();
        $item = Category::find($id);
        return view("Categories::edit", compact('category', 'item'));
    }
    /**
     * @param
     * @return
     */
    public function updateCategory(Request $request, $id) {

        $validator = $request->validate(
            [
                'parent_id' => 'required',
                'name' => ['required', new CategoryValidationRule($request->parent_id, $id)],
                'description' => 'required'
            ],
            [
                'parent_id.required' => 'Please select category',
                'name.required' => 'Please enter name',
                'description.required' => 'Please enter description'
            ]
        );


        $category = Category::find($id);

        $category->parent_id = $request->parent_id;
        $category->category_type = $request->category_type;

        $category->slug = GeneralHelper::seoUrl($request->name);
        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }

        $category->save();

        // Translation
        $categoryTrans = CategoryTrans::where('category_id', $category->id)->where('lang', 'en')->first();
        if (empty($categoryTrans)) {
            $categoryTrans = new CategoryTrans;
            $categoryTrans->category_id = $category->id;
            $categoryTrans->lang = 'en';
        }
        $categoryTrans->name = $request->name;
        $categoryTrans->description = $request->description;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/categories'), $filename);
//            $data['image']= $filename;
            if (isset($request->old_image) && @file_exists(public_path('uploads/categories/'.$request->old_image))) {
                @unlink(public_path('uploads/categories/'.$request->old_image));
            }
            $categoryTrans->img = $filename;
        }

        $categoryTrans->save();

        return redirect()
            ->route('admin.categories')
            ->with('message', 'Category updated successfully.');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if($category){
            if (isset($category->trans->img) && @file_exists(public_path('uploads/categories/'.$category->trans->img))) {
                @unlink(public_path('uploads/categories/'.$category->trans->img));
            }
            CategoryTrans::where('category_id', $id)->delete();
            Category::where('id',$id)->delete();
            return redirect()
                ->route('admin.categories')
                ->with('message', 'Category deleted successfully.');
        } else {
            return redirect()
                ->route('admin.categories')
                ->with('message', 'Category delete failed.');
        }
    }

}
