<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;

class ControllerProject extends Controller {
    public function home() {
        $data = [
            'countries' => Country::get(),
            'categories' => Category::get(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),
            'latestNews' => News::where('id', News::max('id'))->first(),
            'worldNews' => News::inRandomOrder()->take(2)->get(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),
            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
        ];
        return view('/layout/user/home')->with($data);
    }
    public function home2() {
        $data = [
            'countries' => Country::get(),
            'categories' => Category::get(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),
            'latestNews' => News::where('id', News::max('id'))->first(),
            'worldNews' => News::inRandomOrder()->take(2)->get(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),
            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
        ];
        return view('/layout/user/home2')->with($data);
    }
    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $data = [
            'listNews' => News::where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                      ->orWhere('countryname', 'like', '%' . $keyword . '%')
                      ->orWhere('categoriesname', 'like', '%' . $keyword . '%')
                      ->orWhere('content', 'like', '%' . $keyword . '%');
            })->get(),
            'keyword' => $keyword,
            'countries' => Country::get(),
            'categories' => Category::get(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),
            'latestNews' => News::where('id', News::max('id'))->first(),
            'worldNews' => News::inRandomOrder()->take(2)->get(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),
            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),
        ];
        return view('layout/user/search')->with($data);                                            
    }

    public function world($country) {
        $data = [
            'countries' => Country::get(),
            'categories' => Category::get(),
            'countryNews' => News::where('countryname',  $country)->first(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),

            // truy van worldNews & breakingNews cua country nao ..
            'worldNews' => News::where('countryname', $country)->skip(1)->take(2)->get(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),

            'countryList' => News::where('countryname', $country)->paginate(6),
            
            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
        ];
        return view('layout/user/world')->with($data);
    }

    public function category($category) {
        $data = [
            'countries' => Country::get(),
            'categories' => Category::get(),
            'categoryNews' => News::where('categoriesname',  $category)->first(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),


            // truy van latesNews cua category nao ..
            'latestNews' => News::where('categoriesname', $category)->where('id', News::max('id'))->first(),
            // truy van worldNews & breakingNews co lien quan den category nao ..
            'worldNews' => News::where('categoriesname', $category)->skip(1)->take(2)->get(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),

            'categoryList' => News::where('categoriesname', $category)->paginate(6),


            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
        ];
        return view('layout/user/category')->with($data);
    }

    public function breakingnews() {
        $data = [
            'countries' => Country::get(),
            'categories' => Category::get(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),

            'latestNews' => News::where('id', News::max('id'))->first(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->skip(1)->paginate(6),

            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
        ];
        return view('layout/user/breakingnews')->with($data);
    }

    public function news($id, $name) {
        $data = [
            'countries' => Country::get(),
            'categories' => Category::get(),
            'feedbacks' => Feedback::orderBy('id', 'asc')->paginate(5),

            // truy van News cua name nao ..
            'news' => News::where('name', 'like', '%' . $name . '%')->first(),

            'countryNews' => News::where('countryname', $name)->first(),
            'latestNews' => News::where('id', News::max('id'))->first(),
            'worldNews' => News::inRandomOrder()->take(2)->get(),
            'breakingNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(5)->get(),
            
            'listWorldNews' => News::where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
            'listBusinessNews' => News::where('categoriesname', 'Business')->where('id', '<=', News::max('id'))->orderBy('id', 'desc')->take(4)->get(),
        ];
        return view('layout/user/news')->with($data);
    }
}

?>