<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MylayoutController extends Controller
{
    public function index()
    {
        $data = [
            'total_category' => Category::count() + Country::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),
            'news' => News::take(5)->get(),
            'feedbacks' => Feedback::orderBy('id', 'ASC')->paginate(5),
        ];

        return view('/layout/admin/view')->with($data);
    }

    //Category
    public function addCategory()
    {
        $data = [
            'total_category' => Category::count() + Country::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];
        return view('layout/admin/addCategory')->with($data);
    }

    public function saveCategory(Request $request)
    {
        $category = $request->input();
        Category::create($category);

        return redirect('admin/listCategory');
    }

    public function editCategory($id)
    {
        $data = [
            'category' => Category::find($id),
            'total_category' => Category::count() + Country::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];
        return view('layout/admin/editCategory')->with($data);
    }

    public function updateCategory(Request $request)
    {
        $category = $request->input();
        unset($category['_token']);

        Category::where('id', $category['id'])->update($category);
        return redirect('admin/listCategory');
    }

    public function listCategory()
    {
        $data = [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'total_category' => Category::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];
        return view('layout/admin/listCategory')->with($data);
    }

    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return redirect('admin/listCategory');
    }

    //Country
    public function addCountry()
    {
        return view('layout/admin/addCountry');
    }

    public function saveCountry(Request $request)
    {
        $country = $request->input();
        Country::create($country);

        return redirect('admin/listCategory');
    }

    public function editCountry($id)
    {
        $data = [
            'country' => Country::find($id)
        ];
        return view('layout/admin/editCountry')->with($data);
    }

    public function updateCountry(Request $request)
    {
        $country = $request->input();
        unset($country['_token']);

        Country::where('id', $country['id'])->update($country);
        return redirect('admin/listCategory');
    }

    public function deleteCountry($id)
    {
        Country::where('id', $id)->delete();
        return redirect('admin/listCategory');
    }

    //News
    public function addNews()
    {
        $data = [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'total_category' => Category::count() + Country::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];

        return view('layout/admin/addNews')->with($data);
    }

    public function saveNews(Request $request)
    {
        $news = $request->except('_token');
        $file = $request->file('picture');

        // Check if a file was uploaded
        if ($file) {
            // Generate a unique filename
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Move the uploaded file to the public/images directory
            $file->move(public_path('images'), $newFileName);

            // Update the 'picture' field in $news array with the new filename
            $news['picture'] = $newFileName;
        }

        // Save the news to the database
        News::create($news);

        return redirect('admin/listNews');
    }

    public function listNews()
    {
        $data = [
            'news' => News::paginate(5), 
            'total_category' => Category::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),
        ];
        return view('layout/admin/listNews')->with($data);
    }

    public function editNews($id)
    {
        $data = [
            'categories' => Category::get(),
            'countries' => Country::get(),
            'news' => News::find($id),
            'total_category' => Category::count() + Country::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];
        return view('layout/admin/editNews')->with($data);
    }


    public function updateNews(Request $request)
    {
        $news = $request->except('_token');
        $file = $request->file('picture');

        // Check if a file was uploaded
        if ($file) {
            // Generate a unique filename
            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Move the uploaded file to the public/images directory
            $file->move(public_path('images'), $newFileName);

            // Update the 'picture' field in $news array with the new filename
            $news['picture'] = $newFileName;
        }
        News::where('id', $news['id'])->update($news);
        return redirect('admin/listNews');
    }

    public function deleteNews($id)
    {
        News::where('id', $id)->delete();
        return redirect('admin/listNews');
    }

    //User    
    public function listUser()
    {
        $data = [
            'users' => User::paginate(5),
            'total_category' => Category::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];
        return view('layout/admin/listUser')->with($data);
    }

    public function addUser()
    {
        return view('layout/admin/addUser');
    }
    public function saveUser(Request $request)
    {
        $user = $request->input();
        User::create($user);

        return redirect('admin/listUser');
    }

    public function editUser($id)
    {
        $data = [
            'user' => User::find($id),
            'users' => User::get(),
            'total_category' => Category::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),

        ];
        return view('layout/admin/editUser')->with($data);
    }

    public function updateUser(Request $request)
    {
        $user = $request->input();
        unset($user['_token']);

        User::where('id', $user['id'])->update($user);
        return redirect('admin/listUser');
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        $data = [
            'users' => User::get(),
        ];
        return redirect('admin/listUser')->with($data);
    }

    //Feedback
    public function listFeedback()
    {
        $data = [
            'total_category' => Category::count(),
            'total_news' => News::count(),
            'total_user' => User::count(),
            'total_feedback' => Feedback::count(),
            'feedbacks' => Feedback::paginate(5),
        ];
        return view('layout/admin/listFeedback')->with($data);
    }
    public function deleteFeedback($id)
    {
        Feedback::where('id', $id)->delete();
        $data = [
            'feedbacks' => Feedback::paginate(5),
        ];
        return redirect('admin/listFeedback')->with($data);
    }
}
