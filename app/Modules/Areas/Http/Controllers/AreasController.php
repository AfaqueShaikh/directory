<?php

namespace App\Modules\Areas\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers\GeneralHelper;
use App\Modules\Areas\Models\Area;
use App\Rules\AreaValidationRule;
use Illuminate\Http\Request;

class AreasController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Area::all();


        return view("Areas::index", compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addArea()
    {

        return view("Areas::add");
    }

    public function storeArea(Request $request)
    {
        $validator = $request->validate(
            [
                'name' => ['required'],
            ],
            [

                'name.required' => 'Please enter name',

            ]
        );

        $area = new Area();
        $area->name = $request->name;
        $area->save();
        return redirect()
            ->route('admin.areas')
            ->with('message', 'Area added successfully.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editArea($id)
    {
        $category = Area::where('parent_id', 0)
            ->where('active', 1)
//            ->where('id', '<>', $id)
            ->get();
        $item = Area::find($id);
        return view("Areas::edit", compact('category', 'item'));
    }
    /**
     * @param
     * @return
     */
    public function updateArea(Request $request, $id) {

        $validator = $request->validate(
            [
                'parent_id' => 'required',
                'name' => ['required', new AreaValidationRule($request->parent_id, $id)],
                'description' => 'required'
            ],
            [
                'parent_id.required' => 'Please select category',
                'name.required' => 'Please enter name',
                'description.required' => 'Please enter description'
            ]
        );


        $category = Area::find($id);

        $category->parent_id = $request->parent_id;
        $category->category_type = $request->category_type;

        $category->slug = GeneralHelper::seoUrl($request->name);
        $category->active = false;
        if ($request->active) {
            $category->active = true;
        }

        $category->save();

        // Translation
        $categoryTrans = AreaTrans::where('category_id', $category->id)->where('lang', 'en')->first();
        if (empty($categoryTrans)) {
            $categoryTrans = new AreaTrans;
            $categoryTrans->category_id = $category->id;
            $categoryTrans->lang = 'en';
        }
        $categoryTrans->name = $request->name;
        $categoryTrans->description = $request->description;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/areas'), $filename);
//            $data['image']= $filename;
            if (isset($request->old_image) && @file_exists(public_path('uploads/areas/'.$request->old_image))) {
                @unlink(public_path('uploads/areas/'.$request->old_image));
            }
            $categoryTrans->img = $filename;
        }

        $categoryTrans->save();

        return redirect()
            ->route('admin.areas')
            ->with('message', 'Area updated successfully.');
    }

    public function deleteArea($id)
    {

        $category = Area::find($id);

            Area::where('id',$id)->delete();
            return redirect()
                ->route('admin.areas')
                ->with('message', 'Area deleted successfully.');
    }

}
