<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $table = "view";

    public function CheckView($name_page)
    {
        $view = View::where('page', $name_page)->first();
//        dd($view->page);
        if (isset($view->page)) {
            View::where('page', $name_page)->increment('qty');
        } else {
            $view = new View();
            $view->page = $name_page;
            $view->qty = 1;
            $view->save();
        }
    }
}